<?php

namespace App\Http\Controllers;

use App\Mail\MakeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Email extends Controller
{
    public function getmail(REQUEST $request)
    {
        $detail=[
            'email'=>$request->input('email'),
            'body'=>$request->input('contact'),
            'subject'=>$request->input('address'),
            'message'=>$request->input('message'),

        ];
    Mail::to('mharslan193@gmail.com')->send(new MakeMail($detail));
    return redirect()->back()->with('Done','Submitted');
    }
}
