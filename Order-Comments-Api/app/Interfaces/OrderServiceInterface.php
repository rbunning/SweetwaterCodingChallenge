<?php

namespace App\Interfaces;

interface OrderServiceInterface 
{
    public function GetSortedComments();
    public function createOrder(array $orderDetails);
    public function updateOrder($orderId, array $newDetails);
    public function UpdateAllExpectedShipDates();
}