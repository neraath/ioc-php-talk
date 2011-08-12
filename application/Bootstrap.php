<?php
/**
 * Bootstrap file.
 * User: Chris Weldon <chris@chrisweldon.net>
 */
set_include_path(
    get_include_path() . PATH_SEPARATOR .
    '/usr/local/zend/share/dependency-injection/lib' . PATH_SEPARATOR .
    dirname(__FILE__) . '/../library' . PATH_SEPARATOR .
    dirname(__FILE__) . '/../test'
);

require_once 'Zend/Loader/Autoloader.php';
require_once 'sfServiceContainerAutoloader.php';

$autoLoader = \Zend_Loader_Autoloader::getInstance();
$autoLoader->registerNamespace('IocExample');
$autoLoader->pushAutoloader(array('sfServiceContainerAutoloader', 'autoload'), 'sfService');
//sfServiceContainerAutoloader::register();

$sc = new sfServiceContainerBuilder();
$loader = new sfServiceContainerLoaderFileXml($sc);
$loader->load(dirname(__FILE__) . '/../config/container.xml');

\Zend_Registry::set('di_container', $sc);
