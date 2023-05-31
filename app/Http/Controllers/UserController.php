<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
        ]);

        $user = User::create([
            'user_id' => $data['user_id'],
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
        $user = Auth::user();

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
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
