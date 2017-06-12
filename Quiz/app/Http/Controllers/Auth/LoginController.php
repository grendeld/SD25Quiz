<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /*OVERWRITTEN THE attemptLogin from AuthenticatesUsers  in laravel/framework/src/illuminate/foundation/auth
    //Checks which user is to be logged in
    
    //TODO refactor to be more similar to the for loop in resetPassword controller(ref)*/

    protected function attemptLogin(Request $request)
    {
      if (Auth::guard('students')->attempt($this->credentials($request), $request->has('remember')))
        {
          Auth::setDefaultDriver('students');
        $this->redirectTo = '/home';
          return true;
        }
      elseif (Auth::guard('admins')->attempt($this->credentials($request), $request->has('remember'))) {
        Auth::setDefaultDriver('admins');
        return true;
      }
      elseif (Auth::guard('instructors')->attempt($this->credentials($request), $request->has('remember'))) {
        Auth::setDefaultDriver('instructors');
        $this->redirectTo = '/instructorHome';
        return true;
      }
      else {
        return false;
      }
    }


  }
