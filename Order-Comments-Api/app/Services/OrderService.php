<?php

namespace App\Services;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\OrderServiceInterface;
use Illuminate\Support\Str;


class OrderService implements OrderServiceInterface
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Sorts through the comments in the db and creates a sorted list based on defined categories.
     */
    public function getSortedComments()
    {
        $orders = $this->orderRepository->getAllOrders();
        $categories = explode(",", Env('COMMENT_CATEGORIES')); // List of sorted categories.
        $sortedComments = [];
        $sortedComments['misc'] = []; // Create the default Miscellaneous category.

        // Operate through the comments.
        foreach ($orders as $order) {

            $comment = strtolower($order["comments"]); // Remove capitals letters.
            $commentSaved = false;

            // Check through the comment for a match in one of the categories.
            foreach ($categories as $category) {
                if (Str::contains($comment, $category)) {
                    if (!isset($sortedComments[$category])) { // Add category.
                        $sortedComments[$category] = [];
                    }
                    $sortedComments[$category][] = $order; // Add comment to category.
                    $commentSaved = true;
                }
            }

            // Add comment to Miscellaneous category if it did not match.
            if (!$commentSaved) {
                $sortedComments['misc'][] = $order;
            }
        }
        ksort($sortedComments); // Sort accending.
        return $sortedComments;
    }

    /**
     * Creates a new order.
     */
    public function createOrder($payload)
    {
        //$orderDetails['orderid'] = 99999999;
        $orderDetails['orderid'] = mt_rand(10000000, 99999999);
        $orderDetails['comments'] = $payload['comments'];
        $orderDetails['shipdate_expected'] = $this->parseShipDate($payload['comments']);
        return $orderDetails;
    }

    /**
     * Updates a existing order.
     */
    public function updateOrder($orderId, $payload)
    {
        $newDetails['comments'] = $payload['comments'];
        $newDetails['shipdate_expected'] = $this->parseShipDate($payload['comments']);
        return $newDetails;
    }

    /**
     * Updates shipdate_expected db field for all the records.
     */
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

    /**
     * Updates shipdate_expected db field for a single record.
     */
    public function updateExpectedShipDate($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId);
        $shipDate = $this->parseShipDate($order['comments']);
        if ($this->validateShipDate($order['shipdate_expected'], $shipDate)) {
            return $this->orderRepository->updateOrder($order["orderid"], ['shipdate_expected' => $shipDate]);
        }
        return 2;
    }

    /**
     * Parses the Expected Ship Date from the comment.
     */
    private function parseShipDate($comment)
    {
        if (Str::contains($comment, 'Expected Ship Date: ')) {
            return substr($comment, strpos($comment, 'Expected Ship Date: ') + 20, 8);
        }
        return '0000-00-00 00:00:00';
    }

    /**
     * Validates that the Expected Ship Date is needs to be addd the the shipdate_expected db field.
     */
    private function validateShipDate($currentOrderDate, $UpdatedShipDate)
    {
        return ($currentOrderDate == '0000-00-00 00:00:00' && $UpdatedShipDate != '0000-00-00 00:00:00');
    }
}
