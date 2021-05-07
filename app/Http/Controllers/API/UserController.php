<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json($users, 200);
    }
    public function destroy(User $user){
    $user->delete();
    }
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|unique:users|min:8|max:50',
        ]);
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
        if ($user && Hash::check($request['password'],$user->password)){
            return $user;
        }else {
            return ["error"=>"Email y/o clave son incorrectos"];
        }
    }
}
