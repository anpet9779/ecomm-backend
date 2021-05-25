<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Traits\AuthTrait;
use App\Models\User;

use Auth;


class AuthController extends Controller
{
	use AuthTrait;

    public function Register(RegisterRequest $request){
      	// try {
      		if($this->registerUser($request)){
	            $this->statusCode = 201;
	            $this->status = 1;
	            $this->msg = 'Verification link sent on registerd email';
	         } else {
	            $this->statusCode = 400;
	            $this->msg = 'Invalid request';
	        }
        // }catch (\Exception $e) {
        //     $this->statusCode = 400;
        //     $this->status = 0;
        //     $this->msg = 'Something went wrong.';
        // }
        return response()->json(['message' => $this->msg], $this->statusCode);
    }


      public function Login(LoginRequest $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Online::goOnline(Auth::user()->id, $request->ip());
                if(Auth::user()->role == "admin"){
                    return response()->json([
                        'access_token' => Auth::user()->createToken(Str::random(80))->plainTextToken,
                        'user' => Auth::user(),
                        'statusCode'    => 200,
                        'message'   => 'Success'
                    ], 200);
                }else{
                    return response()->json([
                        'access_token' => Auth::user()->createToken(Str::random(80))->plainTextToken,
                        'user' => Auth::user(),
                        'statusCode'    => 200,
                        'message'   => 'Success'
                    ], 200);
                }
            }
            else {
                $this->statusCode = 401;
                $this->status = 1;
                $this->msg = 'Invalid Email/Password or Profile Type.';
            }
        }
        catch (\Exception $e) {
            // dd($e->getMessage());
            $this->statusCode = 400;
            $this->status = 0;
            $this->msg = 'Invalid request.';
        }
        return response()->json(['message' => $this->msg, 'statusCode' => 400], $this->statusCode);
    }



    
}
