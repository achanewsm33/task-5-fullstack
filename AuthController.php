<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $data = [
            'grant_type' => 'password',
            'client_id' => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret'),
            'username' => $request->email,
            'password' => $request->password,
            'scope' => '',
        ];

        $tokenRequest = app('request')->create('/oauth/token', 'POST', $data);
        $response = app()->handle($tokenRequest);
    
        $data = json_decode($response->getContent(), true);
    
        if (isset($data['access_token'])) {
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'token' => $data['access_token'],
                'user' => $user
            ]);
        }
    
        return response()->json($data, $response->getStatusCode());
    

    }
}
