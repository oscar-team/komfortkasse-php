<?php

namespace OscarTeam\KomfortkassePhp\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOrderDetails extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string $orderNumber
     * @param array{includePostings: ?bool, includeCollectionHistory: ?bool, includePaymentReminders: ?bool} $queryParams
     */
    public function __construct(public readonly string $orderNumber, public readonly array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v2/order/' . $this->orderNumber;
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}
