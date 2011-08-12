<?php
/**
 * Bootstrap file.
 * User: Chris Weldon <chris@chrisweldon.net>
 */
set_include_path(
    get_include_path() . PATH_SEPARATOR .
    dirname(__FILE__) . '/../library' . PATH_SEPARATOR .
    dirname(__FILE__) . '/../test'
);

require_once 'Zend/Loader/Autoloader.php';
$autoLoader = \Zend_Loader_Autoloader::getInstance();
$autoLoader->registerNamespace('IocExample');
