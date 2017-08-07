<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLogin;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public static function login(Request $request)
    {
        $user = UserLogin::where('email', $request->email)
            ->where('password', $request->password)
            ->firstOrFail();
        if ($user) {
            $token = bcrypt($user->id);
            $user->token = $token;
            $user->save();
            /*$user->user_details;
            $user->userType;*/
            return response()->json(['status'=>1, 'AuthToken'=>$token], 200);


//            $rtn = ['status' => 1, 'AuthToken' => $token, 'type' =>];
//            $rtn = ['status' => 1, 'AuthToken' => $token, 'type' => 'ADMIN'];
        } else {
            return response()->json(['status'=>'0'], 403);
        }

    }

    public static function authenticate(Request $request){
        $token = $request->header('AuthToken');
        $user = UserLogin::where('token','=',$token)->first(['fullName']);
        return response()->json($user,200);
    }

    public function logout(Request $request){
        $user = new UserLogin() ;
        $user->where('token','=', $request->header('AuthToken'))
            ->update(['token'=>null]);
        return response()->json(['status'=>'1']);
    }

}