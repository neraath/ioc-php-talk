<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Model;

class Customer
{
    private $_name;
    private $_address1;
    private $_address2;
    private $_city;
    private $_state;
    private $_postalCode;
    private $_cellphone;
    private $_email;
    private $_callbackUrl;

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getAddress1()
    {
        return $this->_address1;
    }

    public function setAddress1($address1)
    {
        $this->_address1 = $address1;
    }

    public function getAddress2()
    {
        return $this->_address2;
    }

    public function setAddress2($address2)
    {
        $this->_address2 = $address2;
    }

    public function getCity()
    {
        return $this->_city;
    }

    public function setCity($city)
    {
        $this->_city = $city;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function setState($state)
    {
        $this->_state = $state;
    }

    public function getPostalCode()
    {
        return $this->_postalCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->_postalCode = $postalCode;
    }

    public function getCellphone()
    {
        return $this->_cellphone;
    }

    public function setCellphone($cellphone)
    {
        $this->_cellphone = $cellphone;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getCallbackUrl()
    {
        return $this->_callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->_callbackUrl = $callbackUrl;
    }
}

