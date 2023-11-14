<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function search(Request $request) {

        $user = User::where('name', 'LIKE', "%$request->name%")->first();
        
        if(!$user){
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 401);    
            }else {
            return response()->json([
                'status' => true,
                'message' => 'User found',
                'name' => $user->name,
                'email' => $user->email,
            ], 200);
        }

    }
}
