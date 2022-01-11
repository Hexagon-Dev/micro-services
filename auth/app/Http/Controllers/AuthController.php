<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
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
    /**
     * @throws UnauthorizedException
     * @throws GuzzleException
     */
    public function gateway(Request $request, string $route)
    {
        $token = $request->bearerToken();

        if ($token === null) {
            throw new UnauthorizedException();
        }

        $this->checkToken($token);

        if (str_contains($route, 'stats')) {
            $url = env('STATS_URL');
        } else {
            $url = env('POKEMON_URL');
        }

        $client = new Client();

        return $client->request('GET', $url . $route)->getBody();
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        $user = User::query()->where(['email' => $request->validated()['email']])->first();

        if (!$user) {
            return response()->json(['error' => 'login or password is incorrect'], Response::HTTP_UNAUTHORIZED);
        }

        if (Hash::check($request->validated()['password'], $user->password)) {
            return response()->json(['token' => $this->getJWTToken($user)]);
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
        $key = env('JWT_SECRET');
        $alg = 'HS256';
        return JWT::encode($payload,$key,$alg);
    }

    public function checkToken(string $token): void
    {
        try {
            JWT::decode($token, env('JWT_SECRET'), ["HS256"]);
        } catch (Throwable $e) {
            throw new BeforeValidException($e->getMessage());
        }
    }
}
