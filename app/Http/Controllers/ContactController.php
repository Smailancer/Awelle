<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function show()
    {
        return view('contact');
    }
    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'subject' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send an email with the form data
        Mail::to('salam@awelle.net')->send(new ContactFormMail($request->all()));

        // You can also save the form data to a database if needed

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
