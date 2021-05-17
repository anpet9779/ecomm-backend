<?php 

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use Auth;

trait AuthTrait {

	public function registerUser($request)
	{
		// dd($request->all());
		$user = User::create([
	            	'fname' => $request->fname,
	            	'lname' => $request->lname,
	            	'email' => $request->email,
	            	'password' => bcrypt($request->password),
	            	'gender' => $request->gender,
	            ]);
		if($user){
			if($this->sendMailOnRegistration($request->email)){
				return true;
			}else{
				 return response()->json([
                'status' => 'Error',
                'message' => 'Could not send email'
            ], 500);
			}
		}else{
			return false;

		}
	            // event(new Registered($user));
	}


	public function sendMailOnRegistration($email)
    {
        $user = User::where('email', $email)->first();
        if (empty($user->id)) {
            return response()->json([
                'status' => 'invalid',
                'message' => 'Email address is not registered!'
            ], 200);
        } 
        $token = encrypt($email);
        $url = "localhost:3000/";
        $data = ['token' => $token, 'recoverUrl' => $url.$token, 'name' => $user->fname, 'email' => $user->email];  
        // dd($email);
        Mail::to($email)->send(new Verification($data));
        return true;
    }

}
