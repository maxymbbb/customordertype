<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Observer\Checkout;

use Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterfaceFactory;

class CartSaveAfter implements \Magento\Framework\Event\ObserverInterface
{

    protected $customOrderTypeFactory;
    public function __construct(
        CustomOrderTypeInterfaceFactory $customOrderTypeFactory,
    ) {
        $this->customOrderTypeFactory = $customOrderTypeFactory;
    }
    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
       $customOrderType = $this->customOrderTypeFactory->create();
       //todo
       $customOrderType->setCustomOrderType(1);
       $customOrderType->setExOrderId($observer->getData('id'));
    }
}
