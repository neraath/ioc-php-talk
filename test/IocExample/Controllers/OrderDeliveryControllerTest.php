<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Controllers;

require_once dirname(__FILE__) . '/../../../application/Bootstrap.php';

use \IocExample\Controllers\OrderDeliveryController,
    \IocExample\Data\Interfaces\IOrderRepository,
    \IocExample\Notifier\Interfaces\INotifier;


/**
 * Tests the \IocExample\Controllers\OrderDeliveryController class.
 */
class OrderDeliveryControllerTests extends \PHPUnit_Framework_TestCase
{
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $_repositoryMock;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $_notifierMock;

    /** @var \Zend_Log */
    private $_logger;

    /** @var \Zend_Log_Writer_Mock */
    private $_writer;

    /** @var OrderDeliveryController */
    private $_controller;

    public function setUp()
    {
        $this->_repositoryMock = $this->getMock('\IocExample\Data\Interfaces\IOrderRepository');
        $this->_notifierMock = $this->getMock('\IocExample\Notifier\Interfaces\INotifier');
        $this->_writer = new \Zend_Log_Writer_Mock();
        $this->_logger = new \Zend_Log($this->_writer);
        $this->_controller = new OrderDeliveryController($this->_repositoryMock, $this->_notifierMock, $this->_logger);
    }

    public function testRepositoryExceptionOnlyGetsLogged()
    {
        $this->_repositoryMock->expects($this->once())
                              ->method('getById')
                              ->will($this->throwException(new \Exception()));

        $this->_controller->deliverOrder(0);
        $this->assertThat(count($this->_writer->events), $this->equalTo(1));
        $this->assertThat($this->_writer->events[0]['priorityName'], $this->equalTo('ERR'));
    }

    public function testRepositoryReturnsOrderAndPassesToNotifier()
    {
        $customerToReturn = new \IocExample\Model\Customer();
        $customerToReturn->setName('Test Customer');
        $customerToReturn->setEmail('test@eaxmple.com');
        $orderToReturn = new \IocExample\Model\Order();
        $orderToReturn->setId(1);
        $orderToReturn->setCustomer($customerToReturn);

        $this->_repositoryMock->expects($this->once())
                              ->method('getById')
                              ->with($orderToReturn->getId())
                              ->will($this->returnValue($orderToReturn));

        $this->_notifierMock->expects($this->once())
                            ->method('notifyCustomerOfDelivery')
                            ->with($customerToReturn, $orderToReturn);

        $this->_controller->deliverOrder(1);
        $this->verifyMockObjects();
    }
}
