<?php
namespace Omnipro\QuickProductPositioning\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Position extends AbstractDb
{
    CONST TABLE_NAME = 'omnipro_quickproductpositioning';
    CONST FIELD = 'entity_id';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            self::TABLE_NAME,
            self::FIELD
        );
    }
}
