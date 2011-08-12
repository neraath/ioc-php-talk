<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Model;

class Order
{
    private $_id;

    /**
     * @var Customer
     */
    private $_customer;

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->_customer;
    }

    /**
     * @param Customer $customer
     * @return void
     */
    public function setCustomer(Customer $customer)
    {
        $this->_customer = $customer;
    }
}
