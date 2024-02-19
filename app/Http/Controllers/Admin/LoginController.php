<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validation start
        $rules = [
             'email' => 'required|email',
             'password' => 'required'
        ];

        $validator = validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->getMessageBag()->toArray()]);
        }
        // Validation end

        // Authentication start
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->route('admin.dashboard');

        }else{
            
            return redirect()->back()->with('error', 'Credentials Doesn\'t Match!');
        }
         // Authentication end
    }

    public function forgot(Request $request)
    {
        dd($request->all());
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}