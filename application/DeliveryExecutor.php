<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
require_once 'Bootstrap.php';

// Initialize our repository.
$repository = new \IocExample\Data\OrderRepository(array(
        'dsn' => 'mysql://localhost/database',
        'username' => 'root',
        'password' => ''
));

// Initialize our notifier.
$notifier = new \IocExample\Notifier\EmailNotifier(new \Zend_Mail());

// Initialize our logging.
$writer = new \Zend_Log_Writer_Stream('/var/log/IocExample/debug.log', 'a');
$log = new \Zend_Log();
$log->addWriter($writer);

$orderDeliveryController = new \IocExample\Controllers\OrderDeliveryController($repository, $notifier, $log);
$orderDeliveryController->deliverOrder($argv[0]);
