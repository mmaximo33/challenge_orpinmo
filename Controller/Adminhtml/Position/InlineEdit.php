<?php
namespace Omnipro\QuickProductPositioning\Controller\Adminhtml\Position;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Omnipro\QuickProductPositioning\Model\Position;
use Omnipro\QuickProductPositioning\Model\PositionFactory;

class InlineEdit extends Action
{
    /** @var JsonFactory */
    private $jsonFactory;

    /** @var PositionFactory */
    private $positionFactory;

    /**
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param PositionFactory $positionFactory
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        PositionFactory $positionFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->positionFactory = $positionFactory;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $messages = [];
        $error = false;

        if (!$this->getRequest()->getParam('isAjax')) {
            $messages[] = __('Invalid request.');
            $error = true;
        } else {
            $postItems = $this->getRequest()->getParam('items', []);

            if (empty($postItems)) {
                $messages[] = __('No data sent');
                $error = true;
            } else {
                foreach ($postItems as $postData) {
                    try {
                        $productId = $postData['entity_id'];
                        $positionValue = $postData['position_value'];
                        $model = $this->positionFactory->create();

                        $model->load($productId, 'product_id');
                        if (!$model->getId()) {
                            $model->setProductId($productId);
                            $model->setPositionValue($positionValue);
                        }else{
                            $model->setPositionValue($positionValue);
                        }

                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = $this->getErrorWithPositionId($model, $e->getMessage());
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * @param Position $position
     * @param $errorText
     * @return string
     */
    private function getErrorWithPositionId(
        Position $position,
        $errorText
    ) {
        return sprintf(
            '[Position ID %s ]: %s',
            $position->getProductId(),
            $errorText
        );
    }
}
