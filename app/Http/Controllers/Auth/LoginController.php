<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $this->middleware('guest')->except('logout');
    }

    public function field(Request $request)
    {
        $email = $this->username();
        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'username';
    }

    protected function validateLogin(Request $request)
    {
        $field = $this->field($request);
        $message = ["{$this->username()}.exists" => 'The account you are trying to login is not registered or it has been disabled.'];
        $request->validate([
            $this->username() => "required|string|exists:users,{$field}",
            'password' => 'required|string',
        ], $message);
    }

    protected function credentials(Request $request)
    {
        $field = $this->field($request);
        return [
            $field => $request->get($this->username()),
            'password' => $request->get('password')
        ];
    }

    protected function updateApiToken($request)
    {
        $token = Str::random(80);
        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
        return ['token' => $token];
    }
}
