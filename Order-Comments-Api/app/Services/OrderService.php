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

    public function createOrder($orderDetails)
    {
        return $orderDetails;
    }

    public function updateOrder($orderId, array $newDetails)
    {
        



        return $newDetails;
    }

    public function updateAllExpectedShipDates()
    {
        $orders = $this->orderRepository->getAllOrders();
        foreach ($orders as $order) $this->parseShipDate($order);
        return 1;
    }

    public function updateExpectedShipDate($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId);
        return $this->parseShipDate($order);
    }

    private function parseShipDate($order)
    {
        if ($order['shipdate_expected'] == '0000-00-00 00:00:00') { // The shipdate_expected field is not set.
            $splitComments = explode("\n", $order["comments"]); // Look for shipdate_expected in the comments.
            if (count($splitComments) > 2) { // There is a shipdate_expected value in the comments string.
                $shipDate = explode(": ", $splitComments[1])[1]; // Split out the date.
                return $this->orderRepository->updateOrder($order["orderid"], ['shipdate_expected' => $shipDate]);
            }
        }
        return 2;
    }
}
