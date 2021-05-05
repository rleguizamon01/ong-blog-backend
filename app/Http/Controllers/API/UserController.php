<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        return User::create([
            'role' => User::ROLE_COLLABORATOR,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],  
            'password' => Hash::make($request['password']),
        ]);
    }

    public function login(Request $request)
    {
        $user = User::where('email',$request['email'])->first();
        if ($user && Hash::check($request['password'])){
            return $user;
        }else {
            return ["error"=>"Email y/o clave incorrectos"];
        }
    }



}
