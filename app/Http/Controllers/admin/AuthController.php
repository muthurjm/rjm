<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user_data = array(
            'name' => $request->get('name'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user_data)) {
            return redirect('/admin');
        } else {
            return back()->with('error', 'Invalid Login');
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
