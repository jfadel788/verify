<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function site() {
        return view('site');

    }
    public function admin() {
        return view('admin');

    }
    public function adminlogin(){
        return  view('adminlogin');
    }
    public function CheckAdminlogin(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        if(Auth::guard('admin'))//->attempt(['email'=>$request->email,'password'=>$request->password]))

             return redirect()->intended('/admin');
        return back()->withInput($request->only('email'));




    }

}
