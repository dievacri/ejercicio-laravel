<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function user()
    {
        return 'user';
    }

    public function login(Request $request)
    {
        $messages = [
            'required' => 'El campo :attribute no puede estar vacio.',
        ];

        $data = Validator::make($request->all(), [
            'user' => 'required',
            'password' => 'required',
        ], $messages);

        if ($data->fails()) {
            return response()->json(['rst' => 0, 'errors' => $data->errors()]);
        }

        $loginResult = User::login($request->input('user'), $request->input('password'));

        if ($loginResult->login) {
            return response()->json(['rst' => 1]);
        }else{
            return response()->json(['rst' => 0, 'errors' => ['Credenciales incorrectas / Usuario inactivo']]);
        }
    }
}
