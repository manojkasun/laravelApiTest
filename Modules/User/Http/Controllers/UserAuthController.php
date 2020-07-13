<?php

namespace Modules\User\Http\Controllers;


use Illuminate\Routing\Controller;
use Auth;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api-user'])->except(['login']);
    }

    public function login(UserLoginRequest $req)
    {

        $user = User::where('email', $req['email'])->first();
     //   dd($user);
        if ($user && Hash::check($req['password'], $user['password'])) {
            $token = $user->createToken('api-user')->accessToken;
            return response()->json(['user' => $user, 'token' => $token], 200);
        }
        return response()->json(['error' => 'auth denied'], 422);
    }
    public function currentUser(){
        $user = User::find(Auth::id());
return response()->json($user, 200);
    }


}
