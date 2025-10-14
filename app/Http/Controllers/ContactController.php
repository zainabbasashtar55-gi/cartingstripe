<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
       $data = $request->validate([
    'name' => 'required|string',
    'email' => 'required|email',
    'subject' => 'required|string',
    'messageContent' => 'required|string',
]);

dd($data);

Mail::send('emails.contact', $data, function ($message) use ($data) {
    $message->to('hello@inbox.mailtrap.io')     
            ->subject($data['subject']);
    $message->from($data['email'], $data['name']);

});
return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }}
