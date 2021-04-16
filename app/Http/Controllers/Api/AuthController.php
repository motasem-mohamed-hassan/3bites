<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|unique:users',
            'address'=> 'required',
            'password' => 'required|confirmed'
        ]);

        if($validator->fails()){
            return response([
                'errors'=>$validator->errors()->all(),
                'status'=> 2
            ], 200);
        }

        $request['password'] = bcrypt($request->password);
        $user = User::create($request->toArray());
        $accessToken = $user->createToken('authToken')->accessToken;
        // return response([ 'user' => $user, 'access_token' => $accessToken]);
        return response()->json([
            'status' => 1,
            'user' => $user,
            'access_token' => $accessToken,
        ]);
    
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user){
            if (Hash::check($request->password, $user->password)) {
                $accessToken = $user->createToken('authToken')->accessToken;
                return response([
                    'user' => $user,
                    'access_token' => $accessToken,
                    'status' => 1
                ]);
            }else{
                return response([
                    'status' => 2,
                    'msg' => 'Password wrong'
                ]);
            }
        }else{
            return response([
                'status' => 3,
                'msg' => 'Email wrong'
            ]);
        }
    }





    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
    

}
