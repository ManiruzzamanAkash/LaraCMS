<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Session;

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

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/admin');
        }
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {

        //Validate the form data
        $request->validate([
            'username'         => 'required',
            'password'         => 'required|min:6'
        ]);

        //Attempt to log the employee in
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => 1], $request->remember)) {
            //If successful then redirect to the intended location
            session()->flash('login_success', 'Successfully Logged In');
            return redirect()->intended(route('admin.index'));
        } else {
            if (Auth::attempt(['email' => $request->username, 'password' => $request->password, 'status' => 1], $request->remember)) {
                //If successful then redirect to the intended location
                session()->flash('login_success', 'Successfully Logged In');
                return redirect()->intended(route('admin.index'));
            } else {
                //If unsuccessfull, then redirect to the admin login with the data
                session()->flash('sticky_error', "Username and password combination doesn't match. Please provide correct Username and password");
                return redirect()->back()->withInput($request->only('username', 'remember'));
            }
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
