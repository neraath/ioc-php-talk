<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */

namespace IocExample\Controllers;

use \IocExample\Data\Interfaces\IOrderRepository,
    \IocExample\Notifier\Interfaces\INotifier;

class OrderDeliveryController
{
    /**
     * @var \IocExample\Data\Interfaces\IOrderRepository
     */
    private $_repository;

    /**
     * @var \Zend_Log
     */
    private $_logger;

    /**
     * @var \INotifier
     */
    private $_notifier;

    public function __construct(IOrderRepository $repository, INotifier $notifier, \Zend_Log $logger)
    {
        $this->_repository = $repository;
        $this->_logger = $logger;
        $this->_notifier = $notifier;
    }

    /**
     * Performs order delivery for the provided orderId.
     *
     * @param  int $orderId The unique identifier of the order.
     * @return void
     */
    public function deliverOrder($orderId)
    {
        try {
            $order = $this->_repository->getById($orderId);
            // TODO: Do something useful with the order.
            $this->_notifier->notifyCustomerOfDelivery($order->getCustomer(), $order);
        } catch (\Exception $e) {
            $this->_logger->err('An error occurred while delivering the order: ' . $e->getMessage(), $e);
        }
    }
}