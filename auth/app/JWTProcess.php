<?php

namespace App;

use Firebase\JWT\BeforeValidException;
use Firebase\JWT\JWT;
use Throwable;

class JWTProcess
{
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
