<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
require_once 'Bootstrap.php';

if ($argc <= 1) {
    echo "USAGE: DeliveryExecutor.php orderId\n";
    exit(1);
}

/** @var sfServiceContainerInterface $container */
$container = \Zend_Registry::get('di_container');

/** @var \IocExample\Controllers\OrderDeliveryController $orderDeliveryController */
$orderDeliveryController = $container->getService('delivery_controller');
$orderDeliveryController->deliverOrder($argv[1]);
