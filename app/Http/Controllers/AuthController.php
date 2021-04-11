<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function signin22(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', '=', $email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Login Fail, please check email id'], 401);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Login Fail, pls check password'], 401);
        }



        try {
            if (!JWTAuth::attempt($credentials)) {
                return response()->json(['msg' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['msg' => 'Could not create token'], 500);
        }

        return response()->json(['token' => $token]);
        //return "it works";
    }

    //Hash::check(
    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', '=', $email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Login Fail, please check email id'], 401);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Login Fail, pls check password'], 401);
        }



        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout($id)
    {
        return "okkkk";
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
 
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
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
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }


}
