<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Hash;
use Session;

use Illuminate\Http\Request;

class authcontroller extends Controller
{
    public function adminlogin()
{
    return view('adminlogin');
}
public function logout()
{
   
    Session::forget('loginadminid');

    return redirect('/');
}


public function loginadmin(Request $req)
    {
        $req->validate([

            'email' => 'required',
            'password' => 'required',
        ]);

        $user = admin::where('email', '=', $req->email)->first();

        if ($user) {
            // $userpass = user::where('password', Hash::make($req->password))->count();
            if($req->password==$user->password){
                $req->session()->put('loginadminid', $user->id);

                return redirect('/admin');
            } else {
                Session::flash('msg', 'Invalid Password');

                return redirect('/adminlogin');
            }
        } else {
            Session::flash('msg', 'Invalid Email or Password');

            return redirect('/adminlogin');
        }
    }

}
