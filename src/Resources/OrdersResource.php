<?php

namespace OscarTeam\KomfortkassePhp\Resources;

use OscarTeam\KomfortkassePhp\Requests\GetOrders;
use OscarTeam\KomfortkassePhp\Requests\SubmitOrders;
use OscarTeam\KomfortkassePhp\Requests\SyncOrders;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class OrdersResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function create(array $orderData): Response
    {
        return $this->connector->send(new SubmitOrders($orderData));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAll(array $queryParams = []): Response
    {
        return $this->connector->send(new GetOrders($queryParams));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sync(): Response
    {
        return $this->connector->send(new SyncOrders());
    }
}