<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $user = Admin::where('username', $request->username)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $tokenResult = $user->createToken('Personal Access Token');

                    return response()->json([
                        'status' => 200,
                        'data' => [
                            'access_token' => $tokenResult->accessToken,
                            'token_type' => 'Bearer',
                            'expires_at' => Carbon::parse(
                                $tokenResult->token->expires_at
                            )->toDateTimeString(),
                            'user' => json_encode($user)
                        ]
                    ]);
                } else {
                    return response()->json([
                        'status' => 403
                    ]);
                }
            }
        } catch (\Throwable $e) {
            dd($e->getMessage());
            \Log::info($e->getMessage());
        }
    }
}
