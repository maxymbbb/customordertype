<?php

namespace Bonecki\CustomOrderType\Plugin\Checkout\Model;

class PaymentInformationManagement
{
    public function beforeSavePaymentInformation(
        \Magento\Checkout\Model\PaymentInformationManagement $subject,
        $cartId,
        \Magento\Quote\Api\Data\PaymentInterface $paymentMethod,
        \Magento\Quote\Api\Data\AddressInterface $billingAddress = null
    ) {
        if (!$billingAddress) {
            return;
        }

        if ($billingAddress->getExtensionAttributes()) {
            $billingAddress->setCustomOrderType((int)$billingAddress->getExtensionAttributes()->getCustomOrderType());
        } else {
            $billingAddress->setCustomOrderType(0);
        }
    }
}
