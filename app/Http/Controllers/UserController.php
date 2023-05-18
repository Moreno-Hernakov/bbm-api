<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        $data = request()->validate([
			'name'=>'required|email',
			'email'=>'required',
			'nomor_telfon'=>'required',
			'password'=>'required|min:3',
		]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_telfon' => $request->nomor_telfon,
            'password' => Hash::make($request->password)
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
			'email'=>'required|email',
			'password'=>'required|min:3',
		]);

        if (! $token = auth()->attempt($data)) {
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
