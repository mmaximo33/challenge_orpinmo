<?php
namespace Omnipro\QuickProductPositioning\Model;

use Magento\Framework\Model\AbstractModel;

class Position extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Omnipro\QuickProductPositioning\Model\ResourceModel\Position');
    }
}
