<?php

namespace OscarTeam\KomfortkassePhp\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SubmitOrder extends Request
{
    protected Method $method = Method::POST;

    public function __construct(public readonly string $orderNumber, public readonly array $orderData)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v2/order/' . $this->orderNumber;
    }

    public function defaultBody(): array
    {
        return $this->orderData;
    }
}
