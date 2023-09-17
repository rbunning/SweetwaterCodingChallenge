<?php

namespace App\Services;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }

    public function GetSortedComments()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function createOrder($orderDetails)
    {
        return $orderDetails;
    }

    public function updateOrder($orderId, array $newDetails)
    {
        return $newDetails;

    }

    public function UpdateAllExpectedShipDates()
    {
        return "hi there5";
    }

    public function UpdateExpectedShipDate($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId);

        $comments = explode("\n", $order["comments"]);
        $shipdate = explode(": ", $comments[1]);
        

        return $shipdate;
    }
}
