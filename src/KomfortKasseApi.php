<?php

namespace OscarTeam\KomfortkassePhp;

use OscarTeam\KomfortkassePhp\Resources\OrderResource;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;

class KomfortKasseApi extends Connector
{
    public function __construct(public readonly string $token)
    {
    }

    protected function defaultAuth(): HeaderAuthenticator
    {
        return new HeaderAuthenticator($this->token, 'X-Komfortkasse-API-Key');
    }

    public function resolveBaseUrl(): string
    {
        return 'https://ssl.komfortkasse.eu/api';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function order(): OrderResource
    {
        return new OrderResource($this);
    }
}