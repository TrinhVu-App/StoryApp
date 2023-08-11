<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $req) {
       $req->validated($req->all());

       $arr = [
           'email'=>$req->email,
           'password' => $req->password
       ];
       if(!Auth::attempt($arr)) {
           return $this->error('', 'Credentials do not match', 401);

       }

       $user = User::where('email', $req->email)->first();

       return $this->success([
           'user' => $user,
           'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
       ]);
    }

    public function register(StoreUserRequest $req){
        $req->validated($req->all());

        $user = User::create([
             'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

            return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
            ]);
    }

    public function logout() {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'logged Out'
        ]);
    }
}
