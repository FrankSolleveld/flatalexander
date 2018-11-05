<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUs;
use Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('support');
    }

    public function contactSupport(Request $request)
    {
        $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
        ContactUs::create($request->all());

        Mail::send('email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('mrmadman1300@gmail.com');
                $message->to('wocoalexander@gmail.com', 'Admin')->subject('Support aanvraag');
            });

        return back()->with('success', 'Het bericht is bij ons binnen gekomen.');
    }

}
