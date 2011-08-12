<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */

namespace IocExample\Controllers;

use \IocExample\Data\OrderDeliveryRepository;

class OrderDeliveryController
{
    /**
     * @var \IocExample\Data\OrderDeliveryRepository
     */
    private $_repository;

    /**
     * @var \Zend_Log
     */
    private $_logger;

    public function __construct()
    {
        $this->_repository = new OrderDeliveryRepository();
        $streamWriter = new \Zend_Log_Writer_Stream('/var/log/IocExample/delivery.log', 'a');
        $this->_logger = new \Zend_Log();
        $this->_logger->addWriter($streamWriter);
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

            $mailer = new \Zend_Mail();
            $mailer->setFrom('orders@chrisweldon.net', 'Grumpy Baby Orders');
            $mailer->setSubject('Order #' . $order->getId() . ' out for Delivery');
            $mailer->setBodyText('Your order is being shipped!');
            $mailer->send();
        } catch (\Exception $e) {
            $this->_logger->err('An error occurred while delivering the order.', $e);
        }
    }
}