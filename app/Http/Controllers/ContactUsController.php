<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactUsController extends Controller
{
    public function __construct()
    {

    }

    public function sendMail(Request $request)
    {
        $name = ($request->name ?? 'Anonymous');
        $email = $request->email ?? 'anonymous@anonymous.com';
        $subject = $request->subject;
        $body = $request->message;
        Mail::to('fayvorharrison101@gmail.com')->send(new ContactUsMail($subject, $body, $name, $email));
        return redirect('/');
    }
}
