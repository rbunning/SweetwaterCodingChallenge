<?php

namespace App\Services;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\OrderServiceInterface;
use App\Models\Order;

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
    public function createOrder(array $orderDetails)
    {
    }
    public function updateOrder($orderId, array $newDetails)
    {
    }
    public function UpdateAllExpectedShipDates()
    {
    }
}
