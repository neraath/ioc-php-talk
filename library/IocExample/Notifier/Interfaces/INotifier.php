<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Notifier\Interfaces;
use \IocExample\Model\Customer,
    \IocExample\Model\Order;

interface INotifier
{
    public function notifyCustomerOfDelivery(Customer $customer, Order $order);
}
