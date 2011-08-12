<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Data;
class FakeOrderRepository implements \IocExample\Data\Interfaces\IOrderRepository {

    /**
     * Fetches a single order by its unique Id.
     *
     * @param  int $id
     * @return \IocExample\Model\Order
     */
    public function getById($id)
    {
        $customer = new \IocExample\Model\Customer();
        $customer->setName("Chris Weldon");
        $customer->setEmail("chris@chrisweldon.net");
        $order = new \IocExample\Model\Order();
        $order->setId($id);
        $order->setCustomer($customer);
        return $order;
    }
}
