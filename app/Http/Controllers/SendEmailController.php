<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class SendEmailController extends Controller
{
    public function loadForm()
    {
        return view('loadForm');
    }
    public function send(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'body' => 'required',
            'footer' => 'required'
        ]);

        try {
            //code...
            $mailData = [
                'title' => $request->title,
                'body' => $request->body,
                'footer' => $request->footer
            ];

            Mail::to($request->email)->send(new SendEmail($mailData));
            return redirect('/form')->with('success', 'email was sent successfully!');
        } catch (\Throwable $e) {
            //throw $th;
            return redirect('/form')->with('error', $e->getMessage());
        }
    }
}
