<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\SigninRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends MainController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait\
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as protected traitLogin;
    }

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
        parent::__construct();
        $this->redirectTo = \URL::previous();
        $this->middleware('guest', ['except' => 'logout']);
    }
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/
    public function showLoginForm()
    {
        return view('auth.login',self::$data);
    }
    public function login(SigninRequest $request)
    {
        if ($user = $this->attemptLogin($request)) {
            Session::put('user',auth()->user());
            return $this->sendLoginResponse($request);

        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ? redirect()->route('cms.home'): redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return $user->allowedCMS();
    }
}
