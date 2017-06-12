<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password; //added
use Illuminate\Support\Facades\Auth; //added
use Illuminate\Contracts\Auth\PasswordBroker as PasswordFixer; //added
use Illuminate\Http\Request; //added


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
     // Here we will attempt to reset the user's password. If it is successful we
     // will update the password on an actual user model and persist it to the
     // database. Otherwise we will parse the error and return the response.

    protected $redirectTo = '/home';


    public function reset(Request $request)
    {
      $this->validate($request, $this->rules(), $this->validationErrorMessages());

      $response = PasswordFixer::INVALID_USER;
      $types = ['students','instructors','admins'];
      $pages = ['/home','/instructorHome','/adminHome'];

      for ($i = 0; count($types)>$i && $response == PasswordFixer::INVALID_USER;$i++)
      {

      Auth::setDefaultDriver($types[$i]);

        $response = Password::broker($types[$i])->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
       $this->redirectTo=$pages[$i];
      }

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($response)
                    : $this->sendResetFailedResponse($request, $response);

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



}
