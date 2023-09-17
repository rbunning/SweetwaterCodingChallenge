<?php

namespace App\Interfaces;

interface OrderServiceInterface 
{
    public function getSortedComments();
    public function createOrder(array $orderDetails);
    public function updateOrder($orderId, array $newDetails);
    public function updateAllExpectedShipDates();
    public function updateExpectedShipDate($orderId);
}