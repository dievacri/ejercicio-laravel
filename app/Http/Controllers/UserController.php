<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users', ['data' => $users]);
    }

    public function delete($idUser)
    {
        try{
            User::destroy($idUser);
            return response()->json(['rst' => 1, 'sms' => 'Se elemino correctamente el usuario']);
        }catch (Exception $e){
            return response()->json(['rst' => 0, 'sms' => 'El servicio no se encuentra disponible']);
        }
    }

    public function post(Request $request)
    {
        $messages = [
            'user.required' => 'El Usuario no puede estar vacio.',
            'user.unique' => 'Este usuario ya se encuentra en uso.',
            'password.required' => 'El Password no puede estar vacio.',
            'name.required' => 'El Nombre no puede estar vacio.',
            'last_name.required' => 'El Apellido no puede estar vacio.',
        ];

        $data = Validator::make($request->all(), [
            'user' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required',
            'last_name' => 'required',
        ], $messages);

        if ($data->fails()) {
            return response()->json(['rst' => 0, 'errors' => $data->errors()->all()]);
        }

        $user = $request->all();
        $user['active'] = 1;

        User::create($user);
        return response()->json(['rst' => 1, 'sms' => 'Se registro correctamente el usuario']);
    }

    public function put($userId, Request $request)
    {
        $messages = [
            'user.required' => 'El Usuario no puede estar vacio.',
            'user.unique' => 'Este usuario ya se encuentra en uso.',
            'name.required' => 'El Nombre no puede estar vacio.',
            'last_name.required' => 'El Apellido no puede estar vacio.',
        ];

        $data = Validator::make($request->all(), [
            'user' => 'required|unique:users,user,'. $userId,
            'name' => 'required',
            'last_name' => 'required',
        ], $messages);

        if ($data->fails()) {
            return response()->json(['rst' => 0, 'errors' => $data->errors()->all()]);
        }

        $userData = $request->all();

        $user = User::find($userId);

        $user->name = $userData['name'];
        $user->last_name = $userData['last_name'];
        $user->user = $userData['user'];

        if (!is_null($userData['password'])) {
            $user->password = $userData['password'];
        }

        $user->save();
        return response()->json(['rst' => 1, 'sms' => 'Se modifico correctamente el usuario']);
    }

    public function disable($userId)
    {
        $user = User::find($userId);

        $user->active = 0;

        $user->save();
        return response()->json(['rst' => 1, 'sms' => 'Se desactivo correctamente el usuario']);
    }

    public function enable($userId)
    {
        $user = User::find($userId);

        $user->active = 1;

        $user->save();
        return response()->json(['rst' => 1, 'sms' => 'Se activo correctamente el usuario']);
    }
}
