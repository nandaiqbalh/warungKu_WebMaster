<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        // dd($requset->all());die();
        $user = User::where('email', $request->email)->first();

        if($user){
            if(password_verify($request->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang, '.$user->name . '!',
                    'user' => $user
                ]);
            }
            return $this->errorMessage('Password yang anda masukkan salah!');
        }
        return $this->errorMessage('Email yang anda masukkan tidak terdaftar!');
    }

    public function errorMessage($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
