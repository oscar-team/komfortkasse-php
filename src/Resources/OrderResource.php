<?php

namespace OscarTeam\KomfortkassePhp\Resources;

use OscarTeam\KomfortkassePhp\Requests\CancelOrder;
use OscarTeam\KomfortkassePhp\Requests\GetOrderDetails;
use OscarTeam\KomfortkassePhp\Requests\RemoveOrder;
use OscarTeam\KomfortkassePhp\Requests\SetOrderPaid;
use OscarTeam\KomfortkassePhp\Requests\SetOrderUnPaid;
use OscarTeam\KomfortkassePhp\Requests\SubmitOrder;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class OrderResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function create(string $orderNumber, array $orderData): Response
    {
        return $this->connector->send(new SubmitOrder($orderNumber, $orderData));
    }

    public function get(string $orderNumber, array $queryParams = []): Response
    {
        return $this->connector->send(new GetOrderDetails($orderNumber, $queryParams));
    }

    public function cancel(string $orderNumber): Response
    {
        return $this->connector->send(new CancelOrder($orderNumber));
    }

    public function remove(string $orderNumber): Response
    {
        return $this->connector->send(new RemoveOrder($orderNumber));
    }

    public function markAsPaid(string $orderNumber): Response
    {
        return $this->connector->send(new SetOrderPaid($orderNumber));
    }

    public function markAsUnPaid(string $orderNumber): Response
    {
        return $this->connector->send(new SetOrderUnPaid($orderNumber));
    }

    public function bulkOperation(): OrdersResource
    {
        return new OrdersResource($this->connector);
    }
}