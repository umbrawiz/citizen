<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    /**
     * Handle check
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        try {
            $user = Admin::where('username', $request->username)->first();
            $role = $user->getAllPermissions();

            return response()->json([
                'status' => 200,
                'data' => [
                    'role' => $role
                ]
            ]);
        } catch (\Throwable $e) {
            \Log::info($e->getMessage());
        }
    }
}
