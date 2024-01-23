<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    // ===> Register user
    public function register(Request $request)
    {
        try {
            $registerUserData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|min:8',
                'c_password' => 'required|same:password'
            ]);
            $user = User::create([
                'name' => $registerUserData['name'],
                'email' => $registerUserData['email'],
                'password' => Hash::make($registerUserData['password']),
            ]);
            return response()->json([
                'message' => 'User Created',
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            // Validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // ===> Login
    public function login(Request $request)
    {
        try {
            $loginUserData = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|min:8'
            ]);
            $user = User::where('email', $loginUserData['email'])->first();
            if (!$user || !Hash::check($loginUserData['password'], $user->password)) {
                return response()->json([
                    'message' => 'Invalid Credentials'
                ], Response::HTTP_UNAUTHORIZED);
            }
            $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
            $cookie = cookie('jwt', $token, 60 * 24 * 30);
            return response()->json([
                'message' => 'Success'
            ], Response::HTTP_OK)->withCookie($cookie);
        } catch (ValidationException $e) {
            // Validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // ===> logout
    public function logout()
    {
        try {
            if (auth()->check()) {
                auth()->user()->tokens()->delete();

                return response()->json([
                    'message' => 'Logged out successfully.'
                ]);
            } else {
                return response()->json([
                    'message' => 'Please log in to perform this action.',
                ], Response::HTTP_BAD_REQUEST);
            }
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    // ===> me
    public function me(Request $request)
    {
        try {
            return response()->json($request->user());
        } catch (\Exception $e) {
            // ===> Unexpected error
            return response()->json([
                'message' => 'Server Error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
