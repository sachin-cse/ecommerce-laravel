<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Adminlogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'this field is required',
            'password.required' => 'this field is required'
        ];

        $validate = Validator::make($request->all(), $rules, $messages);

        if($validate->fails()){
            return $validate->errors();
        }

        $email = $request->input('email');
        $password = md5($request->input('password'));
        // dd($password);

        $check_credentials = Admin::where(['email' => $email, 'password' => $password])->get();
        // dd($check_credentials);
        if(isset($check_credentials['0']->id)){
            // dd(1);
            return redirect()->route('admin.dashboard')->with('success', 'you have successfully signed in');
        } else {
            // dd(2);
            return back()->with('error', 'Invalid credentials');
        }

    }

    public function Admindashboard(){
        return view('admin.dashboard');
    }
}
