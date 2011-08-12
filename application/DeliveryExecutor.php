<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
require_once 'Bootstrap.php';

/** @var sfServiceContainerInterface $container */
$container = \Zend_Registry::get('di_container');

/** @var \IocExample\Controllers\OrderDeliveryController $orderDeliveryController */
$orderDeliveryController = $container->getService('delivery_controller');
$orderDeliveryController->deliverOrder($argv[0]);
