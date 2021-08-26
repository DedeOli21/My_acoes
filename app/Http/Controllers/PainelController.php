<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\support\Facades\Auth;
//use Illuminate\support\Facades\Hash;
//use Carbon\Carbon;

class PainelController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required|string'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Tente novamente'], 401);
        }

        $user = $request->user();


        return response()->json(['Message' => 'Login bem-sucedido ' . $user->name, $user], 200);

    }

    public function registrar(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users',
            'password'     => 'required|string|min:6'
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return response()->json(['message' => 'Usuario registrado'], 200);

    }

    public function create(array $data)
    {
        $register = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);


    }



}
