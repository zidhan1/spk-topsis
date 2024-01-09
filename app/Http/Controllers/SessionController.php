<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index()
    {
        return view('session.index');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi'
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/dashboard');
        } else {
            return redirect('/session')->withErrors(['error_login' => 'Email dan Password yang dimasukkan tidak valid !']);
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/session');
    }

    function register()
    {
        return view('session.register');
    }

    function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'role' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required'

            ],
            [
                'name.required' => 'Nama Wajib diisi',
                'role' => 'Role Wajib diisi',
                'username.required' => 'Username sudah digunakan',
                'email.unique' => 'Alamat Email sudah digunakan',
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi'
            ]
        );

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        return redirect('/deleteuser');
        // if (Auth::attempt($infologin)) {
        //     return redirect('/dashboard');
        // } else {
        //     return redirect('/session')->withErrors(['error_login' => 'Email dan Password yang dimasukkan tidak valid !']);
        // }
    }
}
