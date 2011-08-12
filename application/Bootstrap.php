<?php
/**
 * Bootstrap file.
 * User: Chris Weldon <chris@chrisweldon.net>
 */
set_include_path(
    get_include_path() . PATH_SEPARATOR .
    dirname(__FILE__) . '/../library' .
    dirname(__FILE__) . '/../test'
);

$autoLoader = \Zend_Loader_Autoloader::getInstance();
$autoLoader->registerNamespace('IocExample');
