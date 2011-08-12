<?php
/**
 * IoC Example Code
 *
 * Used for helping to present about IoC in PHP.
 *
 * @author Chris Weldon <chris@chrisweldon.net>
 */
namespace IocExample\Data\Interfaces;

interface IOrderRepository
{
    /**
     * Fetches a single order by its unique Id.
     *
     * @abstract
     * @param  int $id
     * @return \IocExample\Model\Order
     */
    public function getById($id);
}
