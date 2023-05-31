<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nomor_telfon' => 'required',
            'password' => 'required|min:3',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);


        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    public function login()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (!$token = auth()->attempt($data)) {
            return response()->json([
                'success' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token
        ], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // return response()->json(auth()->refresh());
        return response()->json([
            'token' => auth()->refresh()
        ]);
    }
}
