<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Notifier;
use \IocExample\Notifier\Interfaces\INotifier,
    \IocExample\Model\Customer,
    \IocExample\Model\Order;
 
class EmailNotifier implements INotifier
{
    /**
     * @var \Zend_Mail
     */
    private $_mailer;

    public function __construct(\Zend_Mail $mailer)
    {
        $this->_mailer = $mailer;
    }

    /**
     * Notifies the customer of their delivery.
     *
     * @param \IocExample\Model\Customer $customer
     * @param \IocExample\Model\Order $order
     * @return void
     */
    public function notifyCustomerOfDelivery(Customer $customer, Order $order)
    {
        $this->_mailer->setFrom('orders@chrisweldon.net', 'Grumpy Baby Orders');
        $this->_mailer->setSubject('Order #' . $order->getId() . ' out for Delivery');
        $this->_mailer->setBodyText('Your order is being shipped!');
        $this->_mailer->addTo($customer->getEmail(), $customer->getName());
        $this->_mailer->send();
    }
}
