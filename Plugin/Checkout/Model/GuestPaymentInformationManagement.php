<?php

namespace Bonecki\CustomOrderType\Plugin\Checkout\Model;

class GuestPaymentInformationManagement
{
    public function beforeSavePaymentInformation(
        \Magento\Checkout\Model\GuestPaymentInformationManagement $subject,
        $cartId,
        $email,
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
