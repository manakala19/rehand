<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class SessionController extends Controller
{
    function index()
    {
        return view('user.login', [
            'title' => "Login Section"
        ]);
    }
    function attempt(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email Required',
            'email.email' =>  'Email Not Valid',
            'password.required' => 'Password Required'
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect('/dashboard');
        } else {
            return redirect('/login')->withErrors('Wrong Password or Email');
        }
    }

    function register(User $user)
    {
        $data = $user->get();
        return view('user.register', compact('data'),     [
            'title' => 'Register'
        ]);
    }
    function create(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);
        Session::flash('nik', $request->nik);
        $request->validate([

            'nik' => 'numeric|min:16',
            'email' => 'email|unique:users',
            'password' => 'min:6',
            'foto' => 'mimes:png,jpg,jpeg'
        ], [
            'nik.numeric' => 'nik Must Be Numeric',
            'nik.min' => 'nik Must Be 16 Character',
            'email.email' => 'Email Not Valid',
            'email.unique' => 'Email Hasbeen Used, please insert a different email',
            'password.min' => 'Password Minimum 6 Character',
            'foto.mimes' => 'Foto Only Allowed JPEG, JPG, PNG, GIF Only'
        ]);

        $foto = $request->file('foto');
        $foto_eks = $foto->extension();
        $foto_name = date('ymdhis') . "." . $foto_eks;
        $foto->move(public_path('foto'), $foto_name);

        $data = [
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password,),
            'foto' => $foto_name
        ];

        User::create($data);
        return redirect('admin')->with('success', 'User Added');

        // $login = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // if (Auth::attempt($login)) {
        //     return redirect('/data');
        // } else {
        //     return redirect('/login')->withErrors('Wrong Password or Email');
        // }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout Done');
    }
}
