<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'username' => 'required|unique:users',
            'email' => 'required|email|max:255',
            'password' => 'required|max:16',
        ]);

        $validator->after(function($validator) use ($data) {
            include app_path('Extends/reserved.php');
            if (in_array($data['username'], reservedUsernames())) {
                $validator->getMessageBag()->add('username', 'That username is unavailable');
            }
        });

        return $validator;
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        
        $validator = Validator::make($data, [ 
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

		if ($validator->fails()) {
            dd($validator);
            return redirect('lecturer/profile')->withErrors($validator);
        }

        $user->name = $data['name'];
        $user->email = $data['email'];

        $user->save();
        
        return redirect()->back();
    }

    function update_password(Request $request) {
        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, [
            'new_password' => 'required|max:50',
            'confirm_password' => 'required|same:new_password',
        ]);

        $credentials = [
            'email' => Auth::user()->email,
            'password' => $data['old_password'],
        ];

        if (!Auth::attempt($credentials) || $validator->fails()) {
            return redirect('lecturer/profile')->withErrors($validator);
        }

        $user->password = bcrypt($data['new_password']);

        $user->save();

        return redirect()->back();
	}
}
