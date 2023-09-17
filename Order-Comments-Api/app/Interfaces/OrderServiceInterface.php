<?php

namespace App\Interfaces;

interface OrderServiceInterface 
{
    public function getSortedComments();
    public function createOrder($payload);
    public function updateOrder($orderId, $payload);
    public function updateAllExpectedShipDates();
    public function updateExpectedShipDate($orderId);
}