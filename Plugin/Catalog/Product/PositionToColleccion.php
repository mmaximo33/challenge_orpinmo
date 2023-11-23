<?php
namespace Omnipro\QuickProductPositioning\Plugin\Catalog\Product;

use Psr\Log\LoggerInterface;
use Omnipro\QuickProductPositioning\Model\ResourceModel\Position\CollectionFactory as PositionCollectionFactory;

class PositionToColleccion
{
    /** @var LoggerInterface  */
    private $logger;

    /** @var PositionCollectionFactory  */
    private $positionCollectionFactory;

    /**
     * @param LoggerInterface $logger
     * @param PositionCollectionFactory $positionCollectionFactory
     */
    public function __construct(
        LoggerInterface $logger,
        PositionCollectionFactory $positionCollectionFactory
    )
    {
        $this->logger = $logger;
        $this->positionCollectionFactory = $positionCollectionFactory;
    }

    /**
     * @param $subject
     * @param $result
     * @return mixed
     */
    public function afterGetData($subject, $result)
    {
        if (isset($result['items'])) {
            foreach ($result['items'] as &$item) {
                $item['position_value'] = $this->getPositionValue($item['entity_id']);
                $item['position_value_editable'] = $item['position_value'];
            }
        }

        return $result;
    }

    /**
     * @param $productId
     * @return null
     */
    private function getPositionValue($productId)
    {
        try {
            $positionCollection = $this->positionCollectionFactory->create();
            $positionCollection->addFieldToFilter('product_id', $productId);

            return $positionCollection->getFirstItem()->getData('position_value');
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            return null;
        }
    }
}
