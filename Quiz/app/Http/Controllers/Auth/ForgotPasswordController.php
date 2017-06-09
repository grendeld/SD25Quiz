<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password; //added
use Illuminate\Support\Facades\Auth; //added
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\PasswordBroker as PasswordFixer; //added

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     //formerly overwrote  broker() from one of the PasswordBroker.php
     //remains here for reference

    // public function broker()
     //{
    //   return Password::broker('students');
    // }
     //overwritten sendResetLinkEmail


     public function sendResetLinkEmail(Request $request)
     {
         $this->validateEmail($request);

         // We will send the password reset link to this user. Once we have attempted
         // to send the link, we will examine the response then see the message we
         // need to show to the user. Finally, we'll send out a proper response.
         $response = PasswordFixer::INVALID_USER;
         $types = ['students','instructors','admins'];


        
        for ($i = 0; count($types)>$i && $response == PasswordFixer::INVALID_USER;$i++)
        {
          $response = Password::broker($types[$i])->sendResetLink($request->only('email'));
        }

          //dd($response);
         return $response == Password::RESET_LINK_SENT
                     ? $this->sendResetLinkResponse($response)
                     : $this->sendResetLinkFailedResponse($request, $response);
     }

    public function __construct()
    {
        $this->middleware('guest');
    }
}
