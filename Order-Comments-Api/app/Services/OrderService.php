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
        $orders = $this->orderRepository->getAllOrders();



        return "hi there5";
    }

    public function UpdateExpectedShipDate($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId);
        if ($order['shipdate_expected'] != '0000-00-00 00:00:00') return "1";
        $shipdate = $this->ParseShipDate($order["comments"]);
        return $this->orderRepository->updateOrder($orderId, ['shipdate_expected' => $shipdate]);
    }

    private function ParseShipDate($comments)
    {
        $splitComments = explode("\n", $comments);
        return explode(": ", $splitComments[1])[1];
    }
}
