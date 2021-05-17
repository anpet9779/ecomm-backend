<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\AuthTrait;
use App\Models\User;

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



    
}
