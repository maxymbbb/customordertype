<?php

namespace Bonecki\CustomOrderType\Plugin\Quote\Model\Quote\Address;

class ToOrderAddress
{
    public function aroundConvert(
        \Magento\Quote\Model\Quote\Address\ToOrderAddress $subject,
        \Closure $proceed,
        \Magento\Quote\Model\Quote\Address $address,
        $data = []
    ) {
        $result = $proceed($address, $data);

        $json = json_decode(file_get_contents('php://input'), true);

        if (isset($json['billingAddress']['customAttributes']['custom_order_type_choice'])) {
            //for registered customer with saved address
            if ($json['billingAddress']['customAttributes']['custom_order_type_choice']) {
                $result->setCustomOrderType($json['billingAddress']['customAttributes']['custom_order_type_choice']);
            }
        } elseif (isset($json['billingAddress']['customAttributes'][0]['value'])) {
            //for guest
            if ($json['billingAddress']['customAttributes'][0]['value']) {
                $result->setCustomOrderType(true);
            }
        } else {
            if (isset($json['billingAddress']['customAttributes']['custom_order_type']['value'])) {
                $result->setCustomOrderType($json['billingAddress']['customAttributes']['custom_order_type']['value']);
            } else {
                $result->setCustomOrderType(null);
            }
        }

        return $result;
    }
}
