<?php

namespace App\Services;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\OrderServiceInterface;
use App\Models\SortedComments;
use Illuminate\Support\Str;


class OrderService implements OrderServiceInterface
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getSortedComments()
    {
        $orders = $this->orderRepository->getAllOrders();

        $sortedComments = new SortedComments();

        foreach ($orders as $order) {

            $comment = $order["comments"];
            $commentSaved = false;

            if (Str::contains($comment, 'candy')) {
                $sortedComments->candy[] = $order;
                $commentSaved = true;
            }

            if (Str::contains($comment, 'call')) {
                // preg_match('/\bcall\b/', $comment)
                $sortedComments->call[] = $order;
                $commentSaved = true;
            }

            if (Str::contains($comment, 'referred')) {
                $sortedComments->referred[] = $order;
                $commentSaved = true;
            }

            if (Str::contains($comment, 'signature')) {
                $sortedComments->signature[] = $order;
                $commentSaved = true;
            }

            if (!$commentSaved) {
                $sortedComments->misc[] = $order;
            }
        }
        return $sortedComments;
    }

    public function createOrder($payload)
    {
        //$orderDetails['orderid'] = 99999999;
        $orderDetails['orderid'] = mt_rand(10000000, 99999999);
        $orderDetails['comments'] = $payload['comments'];
        $orderDetails['shipdate_expected'] = $this->parseShipDate($payload['comments']);
        return $orderDetails;
    }

    public function updateOrder($orderId, $payload)
    {
        $newDetails['comments'] = $payload['comments'];
        $newDetails['shipdate_expected'] = $this->parseShipDate($payload['comments']);
        return $newDetails;
    }

    public function updateAllExpectedShipDates()
    {
        $orders = $this->orderRepository->getAllOrders();
        foreach ($orders as $order) {
            $shipDate = $this->parseShipDate($order['comments']);
            if ($this->validateShipDate($order['shipdate_expected'], $shipDate)) {
                $this->orderRepository->updateOrder($order["orderid"], ['shipdate_expected' => $shipDate]);
            }
        }
        return 1;
    }

    public function updateExpectedShipDate($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId);
        $shipDate = $this->parseShipDate($order['comments']);
        if ($this->validateShipDate($order['shipdate_expected'], $shipDate)) {
            return $this->orderRepository->updateOrder($order["orderid"], ['shipdate_expected' => $shipDate]);
        }
        return 2;
    }

    private function parseShipDate($comment)
    {
        if (Str::contains($comment, 'Expected Ship Date: ')) {
            return substr($comment, strpos($comment, 'Expected Ship Date: ') + 20, 8);
        }
        return '0000-00-00 00:00:00';
    }

    private function validateShipDate($currentOrderDate, $UpdatedShipDate)
    {
        return ($currentOrderDate == '0000-00-00 00:00:00' && $UpdatedShipDate != '0000-00-00 00:00:00');
    }
}
