<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface 
{
    public function getAllOrders() 
    {
        return Order::all();
    }

    public function getOrderById($orderId) 
    {
        return Order::findOrFail($orderId);
    }

    public function createOrder(array $orderDetails) 
    {
        return Order::create($orderDetails);
    }

    public function updateOrder($orderId, array $newDetails) 
    {
        return Order::where('orderid','=', $orderId)->update($newDetails);
    }
}