<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', Password::defaults()],
            'role' => ['required', 'in:pembeli,vendor']
        ]);

        DB::beginTransaction();

        try {
            // Hash the password before saving
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $user->assignRole($validated['role']);

            // Commit the transaction
            DB::commit();

            // Redirect to the index page
            return redirect()->route('admin.users.index');
        } catch (\Throwable $th) {
            // Rollback transaction if something goes wrong
            DB::rollBack();

            // Log the error for debugging
            Log::error('User creation failed: ' . $th->getMessage());

            return redirect()->back()->with('error', 'Failed to create user. Error: ' . $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'string|max:255|sometimes',
            'email' => 'email|max:255|sometimes',
            'password' => 'string|min:8|nullable',
            'role' => 'required|in:pembeli,vendor'
        ]);

        DB::beginTransaction();

        try {
            if (!empty($request['password'])) {
                $user->password = Hash::make($validated['password']);
            };
            $validated['password'] = $user->password;
            $user->update($validated);
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'data user berhasil diperbarui!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error
            Log::error('User deletion failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.users.index')->with('error', 'Failed to delete user. Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            // Find the user by ID
            $user = User::find($id);

            if (!$user) {
                // If the user is not found, throw an exception
                return redirect()->route('admin.users.index')->with('error', 'User not found.');
            }

            // Delete the user
            $user->delete();

            // Commit the transaction
            DB::commit();

            // Redirect back with success message
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Log the error
            Log::error('User deletion failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.users.index')->with('error', 'Failed to delete user. Error: ' . $e->getMessage());
        }
    }
}
