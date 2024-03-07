<?php

namespace OscarTeam\KomfortkassePhp\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SubmitOrder extends Request implements HasBody
{
    use HasJsonBody;

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
