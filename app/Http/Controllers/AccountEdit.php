<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountEdit extends Controller
{
    private $updater;
    function __construct(){
        $this->updater = new UniversalUpdater();
    }

    public function edit(){
        return view("auth.account-edit");
    }
    public function editAction(Request $request){
        $user = Auth::user();

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password]))
        {
            $this->updater->update($user, $request->all(), true,false);
            $request->session()->flash('status', 'Account Details Changed!');
            return redirect("account-edit");
        }else {
            $request->session()->flash('badStatus', 'Current Password Is Not True!');
            return redirect("account-edit");
        }
    }
    public function changePassword(Request $request){
        $token = $request->_token;
        return view('auth.passwords.reset',compact('token'));
    }

}
