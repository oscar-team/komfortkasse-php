<?php

namespace OscarTeam\KomfortkassePhp\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SubmitOrders extends Request implements HasBody
{
    use HasJsonBody;

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
