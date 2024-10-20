<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $activeUser = User::count();
        $category = Category::count();
        return view('dashboard', compact('activeUser', 'category'));
    }
}
