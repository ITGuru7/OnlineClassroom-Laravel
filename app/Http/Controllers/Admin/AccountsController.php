<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class AccountsController extends Controller
{
    public function index()
    {
        $users = User::all()->except(Auth::id());
        return view('admin.accounts.index', ['accounts' => $users]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect(route('admin.accounts.index'));
    }
}
