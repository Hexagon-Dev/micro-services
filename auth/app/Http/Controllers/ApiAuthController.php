<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ApiAuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $user = User::query()->where(['login' => $request->toArray()['login']])->first();

        if (!$user) {
            return response()->json(['error' => 'login or password is incorrect'], Response::HTTP_UNAUTHORIZED);
        }

        if (Hash::check($request->toArray()['password'], $user->password)) {
            return response()->json(['token' => $this->getJWTToken($user)]);
        }

        return response()->json(['error' => 'login or password is incorrect'], Response::HTTP_UNAUTHORIZED);
    }


    /**
     * @param Request $request
     * @return string
     */
    public function register(Request $request): string
    {
        $user = User::query()->create([
            'name' => 'test',
            'email' => 'test',
            'password' => 'test',
        ]);

        return response()->json([
            'message' => 'successful',

        ]);
    }
    /**
     * @param $value
     * @return string
     */
    public function getJWTToken($value): string
    {
        $time = time();
        $payload = [
            'iat' => $time,
            'nbf' => $time,
            'exp' => $time + 7200,
            'data' => [
                'id' => $value['id'],
                'username' => $value['user_name']
            ]
        ];
        $key =  env('JWT_SECRET');
        $alg = 'HS256';
        return JWT::encode($payload,$key,$alg);
    }

    public function checkToken(Request $request): bool
    {
        $token = $request->toArray()['token'];

        try {
            JWT::decode($token, env('JWT_SECRET'), ["HS256"]);
        } catch (Throwable $e) {
            return false;
            //throw new BeforeValidException($e->getMessage());
        }

        return true;
    }
}
