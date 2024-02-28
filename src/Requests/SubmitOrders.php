<?php

namespace OscarTeam\KomfortkassePhp\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SubmitOrders extends Request
{
    protected Method $method = Method::POST;

    public function __construct(public readonly array $orderData)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v2/orders';
    }

    public function defaultBody(): array
    {
        return $this->orderData;
    }
}
