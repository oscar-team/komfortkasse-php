<?php

namespace OscarTeam\KomfortkassePhp\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SetOrderPaid extends Request
{
    protected Method $method = Method::POST;

    public function __construct(public readonly string $orderNumber)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v2/order/' . $this->orderNumber . '/setpaid';
    }
}
