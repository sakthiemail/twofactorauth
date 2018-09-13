<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->token_2fa_expiry > \Carbon\Carbon::now()){
            return $next($request);
        } 
        
        //$user->token_2fa = mt_rand(10000,99999);
        $user->save();        
        // This is the twilio way
        //Twilio::message($user->phone_number, 'Two Factor Code: ' . $user->token_2fa);
        // If you want to use email instead just 
        // send an email to the user here ..
		// Send an asynchronous request.
		
		//$client = new \GuzzleHttp\Client();
		//$request = new \GuzzleHttp\Psr7\Request('GET', 'https://2factor.in/API/V1/{Api}/SMS/+91'.$user->phone_number.'/'.$user->token_2fa);
		//$promise = $client->sendAsync($request)->then(function ($response) {
			//echo 'I completed! ' . $response->getBody();
		//});
		//$promise->wait();
        return redirect('/2fa');  
    }
}
