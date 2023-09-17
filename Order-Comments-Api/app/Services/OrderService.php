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

        foreach ($orders as $order) {
            if ($order['shipdate_expected'] == '0000-00-00 00:00:00') { // The shipdate_expected field is not set.
                $splitComments = explode("\n", $order["comments"]); // Look for shipdate_expected in the comments.
                if (count($splitComments) > 2){ // There is a shipdate_expected value in the comments string.
                    $shipdate = explode(": ", $splitComments[1])[1]; // Split out the date.
                    $this->orderRepository->updateOrder($order["orderId"], ['shipdate_expected' => $shipdate]);
                } 
            }
        }
        return 1;
    }

    public function UpdateExpectedShipDate($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId);

        if ($order['shipdate_expected'] != '0000-00-00 00:00:00') return "2"; // The shipdate_expected field is set.
        $splitComments = explode("\n", $order["comments"]); // Look for shipdate_expected in the comments.
        if (count($splitComments) < 3) return "2"; // There is no shipdate_expected value in the comments string.
        $shipdate = explode(": ", $splitComments[1])[1]; // Split out the date.

        return $this->orderRepository->updateOrder($orderId, ['shipdate_expected' => $shipdate]);
    }
}
