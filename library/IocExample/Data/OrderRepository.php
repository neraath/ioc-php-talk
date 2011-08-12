<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Data;
use IocExample\Data\Interfaces\IOrderRepository,
    IocExample\Model\Customer,
    IocExample\Model\Order;

class OrderRepository implements IOrderRepository
{
    /**
     * @var \Zend_Db_Adapter_Abstract
     */
    private $_database;

    public function __construct(array $config)
    {
        $this->_database = \Zend_Db::factory('Pdo_Mysql', $config);
    }

    /**
     * Fetches a single order by its unique Id.
     *
     * @param  int $id
     * @return Order
     */
    public function getById($id)
    {
        try {
            $result = $this->_database->fetchOne(
                'SELECT o.*,c.* FROM order o INNER JOIN customer c ON o.customer_id = c.id WHERE o.id = ?',
                array($id));

            if ($result == null) throw new \Exception("Could not find order with id " . $id);
            $customer = new Customer();
            $customer->setName($result['name']);
            $customer->setAddress1($result['address_1']);
            $customer->setAddress2($result['address_2']);
            $customer->setCity($result['city']);
            $customer->setState($result['state']);
            $customer->setPostalCode($result['postal_code']);
            $customer->setCellphone($result['cell_phone']);
            $customer->setEmail($result['email']);
            $customer->setCallbackUrl($result['callback_url']);
            $order = new Order();
            $order->setId($id);
            $order->setCustomer($customer);

            return $order;
        }
        catch (\Exception $e)
        {
            throw $e;
        }
    }
}
