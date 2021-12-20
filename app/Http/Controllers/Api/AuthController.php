<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $result = Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], true);
            if ($result) {
                return response()->json([
                    'status' => 200
                ]);
            } else {
                return response()->json([
                    'status' => 403
                ]);
            }
        } catch (\Throwable $e) {
            \Log::info($e->getMessage());
        }
    }
}
