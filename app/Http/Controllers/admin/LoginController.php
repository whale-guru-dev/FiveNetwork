<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Model\Admin;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
	  
      $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {

      // Validate the form data
      $this->validate($request, [
        'username' => 'required',
        'password' => 'required|min:6'
      ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
          $admin = Admin::where('username',$request->username)->first();
          // if successful, then redirect to their intended location
          $sid = md5(time().$admin->username);
          $admin->sid = $sid;
          $admin->save();
          // Session::put('sid',$sid);
          session(['sid' => $sid]);
          return redirect('/admin');
          // return $this->sendLoginResponse($request);
        }
        // if unsuccessful, then redirect back to the login with the form data
        // return redirect()->back()->withInput($request->only('username', 'remember'));
        $this->incrementLoginAttempts($request);
     
        return $this->sendFailedLoginResponse($request);
      
    }

    public function username()
    {
        return 'username';
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        return redirect()->guest(route( 'admin.login' ));
    }
}
