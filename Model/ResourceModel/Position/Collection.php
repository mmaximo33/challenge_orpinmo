<?php
namespace Omnipro\QuickProductPositioning\Model\ResourceModel\Position;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Omnipro\QuickProductPositioning\Model\Position;
use Omnipro\QuickProductPositioning\Model\ResourceModel\Position as PositionResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Position::class, PositionResourceModel::class);
    }
}
