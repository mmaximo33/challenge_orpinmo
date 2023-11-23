<?php
namespace Omnipro\QuickProductPositioning\Model\ResourceModel\Position;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            Omnipro\QuickProductPositioning\Model\Position::class,
            Omnipro\QuickProductPositioning\Model\ResourceModel\Position::class
        );
    }
}
