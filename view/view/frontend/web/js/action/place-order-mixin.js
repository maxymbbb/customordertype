define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper, quote) {
    'use strict';

    return function (placeOrderAction) {
        return wrapper.wrap(placeOrderAction, function (originalAction) {

            var billingAddress = quote.billingAddress();
            var shippingAddress = quote.shippingAddress();


            if (billingAddress.customAttributes === undefined) {
                billingAddress.customAttributes = {};
            }

            if (billingAddress['extension_attributes'] === undefined) {
                billingAddress['extension_attributes'] = {};
            }

            var shippingCustomAtrributesCopy = shippingAddress.customAttributes;
            billingAddress.customAttributes = shippingCustomAtrributesCopy;

            try {
                if (shippingAddress.customAttributes.custom_order_type_choice === true) {
                    billingAddress.customAttributes['custom_order_type_choice'] = shippingAddress.customAttributes[0];
                    billingAddress['customAttributes']['custom_order_type'].value = true;
                    billingAddress['customAttributes']['custom_order_type'].label = ' ';
                    billingAddress['extension_attributes']['custom_order_type'] = true;
                } else {
                    billingAddress['extension_attributes']['custom_order_type'].label = ' ';
                    billingAddress['customAttributes']['custom_order_type'].label = ' ';
                }
            } catch (e) {
                return originalAction();
            }

            return originalAction();
        });
    };
});
