<?php

namespace OscarTeam\KomfortkassePhp\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOrders extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param array{maxAge: ?string, paymentStatus: ?string, minPostingDate: ?string, includePostings: ?bool, includeCollectionHistory: ?bool, includePaymentReminders: ?bool} $queryParams
     */
    public function __construct(public readonly array $queryParams = [])
    {
    }

    public function resolveEndpoint(): string
    {
        return '/v2/orders';
    }

    public function defaultQuery(): array
    {
        return $this->queryParams;
    }
}
