<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{client};
use Auth;

class authenticationController extends Controller
{
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('Admin')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('adminDashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    
    public function workerLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('work')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('workersDashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    
    public function managerLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
 
        if (Auth::guard('manager')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('managerDashboard');
        }
 
        return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function clientLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('clients')->attempt($credentials)) {
            $request->session()->regenerate();
 
            redirect()->intended('clientDashboard');
        }
 
        back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function clientRegister(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name'=> 'required',
            'phone_no'=>'required'
        ]);
 
     try{
        client::create([
            'name'=>$request->name,
            'phone_no'=>$request->phone_no,
            'password'=>bcrypt($request->password),
            'email'=>$request->email
        ]);
        return to_route('customerDashboard');

     }catch(\throwable)
     {
        return back()->withErrors('email: email or password is incorrect');

     }
    }
    public function logout()
{
    Auth::logout();
}
}
