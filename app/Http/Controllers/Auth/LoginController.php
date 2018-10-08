<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('name', 'password');

        // Attempt to log the user in
        if (!Auth::attempt($credentials, $request->remember)) {
            return redirect()->back()->withInput($request->only('email', 'name', 'remember'));
        } else {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect(route('admin.courses.index'));
            } else if ($user->role == 'lecturer') {
                return redirect(route('lecturer.courses.index'));
            } else if ($user->role == 'student') {
                return redirect(route('student.courses.index'));
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
