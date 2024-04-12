<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Controller\Adminhtml\CustomOrderType;

class Delete extends \Bonecki\CustomOrderType\Controller\Adminhtml\CustomOrderType
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('customordertype_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Bonecki\CustomOrderType\Model\CustomOrderType::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Customordertype.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['customordertype_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Customordertype to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

