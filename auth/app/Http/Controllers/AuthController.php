<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\JWTProcess;
use App\Models\User;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request): JsonResponse
    {
        $JWTProcess = new JWTProcess();

        $user = User::query()->where(['email' => $request->validated()['email']])->first();

        if (!$user) {
            return response()->json(['error' => 'login or password is incorrect'], Response::HTTP_UNAUTHORIZED);
        }

        if (Hash::check($request->validated()['password'], $user->password)) {
            return response()->json(['token' => $JWTProcess->getJWTToken($user)]);
        }

        return response()->json(['error' => 'login or password is incorrect'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @param CreateUserRequest $request
     * @return string
     */
    public function register(CreateUserRequest $request): string
    {
        User::query()->create($request->validated());

        return response()->json([
            'message' => 'successful',
        ]);
    }
}
