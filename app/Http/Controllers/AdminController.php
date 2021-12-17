<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Email;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create(){
        if (session()->has('admin')) {
            return redirect('/admin/dashboard');
        }
        return view('admin.auth.login');
    }
    public function dashboard(){
        if (session()->has('admin')) {
        $emaildata = Email::get();
        return view('admin.dashboard',['emaildata' => $emaildata]);
        }
        return redirect('/admin/login');
    }
    public function dologin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = Admin::where('username', '=', $request->username)->first();
        if(!$user)
            return redirect()->back()->with('failed','Login/Password is not correct');
        if(Hash::check($request->password, $user->password))
        {
            session(['admin' => $request->username]);
            return redirect()->route('admin.dashboard');
        } else{
            return redirect()->back()->with('failed','Login/Password is not correct');
        }
    }
    public function logout(Request $request) {
        session()->flush();
        return redirect('/admin/login');
}
}
