<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TwoFactorController extends Controller
{
    public function verifyTwoFactor(Request $request)
	{
		$this->validate($request, [
			'2fa' => 'required|numeric',        
		]);

		if($request->input('2fa') == Auth::user()->token_2fa){            
            $user = Auth::user();
            $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(config('session.lifetime'));
            $user->save();       
            return redirect('/home');
        } else {
            return redirect('/2fa')->with('message', 'Incorrect code.');
        }
	}
	
	public function showTwoFactorForm()
    {
        return view('auth.twofactor');
    } 
}
