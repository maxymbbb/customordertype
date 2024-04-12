<?php

namespace Bonecki\CustomOrderType\Plugin\Checkout\Model;

class ShippingInformationManagement
{
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
        $shippingAddress = $addressInformation->getShippingAddress();
        $billingAddress = $addressInformation->getBillingAddress();

        if ($shippingAddress->getExtensionAttributes()) {
            $shippingAddress->setCustomOrderType((int)$shippingAddress->getExtensionAttributes()->getCustomOrderType());
        } else {
            $shippingAddress->setCustomOrderType(0);
        }

        if ($billingAddress->getExtensionAttributes()) {
            $billingAddress->setCustomOrderType((int)$billingAddress->getExtensionAttributes()->getCustomOrderType());
        } else {
            $billingAddress->setCustomOrderType(0);
        }
    }
}
