<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','registerUser']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect Credentials'], 401);
        }

        return $this->respondWithToken($token);
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
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' =>auth()->user(),//gives the user infomations
            'expires_in' => auth()->factory()->getTTL() * 60 //token expiration
        ]);
    }

    Public function registerUser(Request $request)
    {
        $encryptpass = Hash::make($request->password);

        $user = new User;
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $encryptpass;
            $user->privilege = $request->privilege;
            $user->save();
            return $this->login($request);
        } catch (Execption $e) {
            return response()->json([
                'success'=>false,
                'message'=>$e
            ]);
        }
    }
}
