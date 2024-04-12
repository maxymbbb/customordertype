define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper, quote) {
    'use strict';

    return function (setShippingInformationAction) {
        return wrapper.wrap(setShippingInformationAction, function (originalAction) {

            var shippingAddress = quote.shippingAddress();
            var billingAddress = quote.billingAddress();



            var customordertype_checkbox = '';
            var custom_order_type_input = $("input[name='custom_attributes[custom_order_type]']");
            if (custom_order_type_input.is(':checked')) {
                customordertype_checkbox = custom_order_type_input.val();
            }

            $("input[name='custom_attributes[custom_order_type]']").change(function () {
                if ($(this).prop("checked")) {
                    customordertype_checkbox = $(this).val();
                    shippingAddress.customAttributes['custom_order_type_choice'] = true;
                    billingAddress.customAttributes['custom_order_type_choice'] = true;
                                            shippingAddress.customAttributes['custom_order_type'].label = ' ';
                        billingAddress.customAttributes['custom_order_type'].label = ' ';
                }
                customordertype_checkbox = $(this).val();
                shippingAddress.customAttributes['custom_order_type_choice'] = false;
                billingAddress.customAttributes['custom_order_type_choice'] = false;
                shippingAddress.customAttributes['custom_order_type'].label = ' ';
                billingAddress.customAttributes['custom_order_type'].label = ' ';
            });

            if (shippingAddress.customAttributes === undefined) {
                shippingAddress.customAttributes = {};
            }

            if (shippingAddress['extension_attributes'] === undefined) {
                shippingAddress['extension_attributes'] = {};
            }

            try {

                        shippingAddress.customAttributes['custom_order_type'].label = ' ';
                        billingAddress.customAttributes['custom_order_type'].label = ' ';

                if (customordertype_checkbox == 'on') {
                    if (shippingAddress.customAttributes[0] !== undefined) {
                        shippingAddress.customAttributes['custom_order_type_choice'] = true;
                        billingAddress.customAttributes['custom_order_type_choice'] = true;
                    }

                    if (shippingAddress.customAttributes['custom_order_type'] !== undefined)
                    {
                        shippingAddress.customAttributes['custom_order_type'].label = ' ';
                        billingAddress.customAttributes['custom_order_type'].label = ' ';
                        shippingAddress.customAttributes['custom_order_type_choice'] = true;
                        billingAddress.customAttributes['custom_order_type_choice'] = true;
                        shippingAddress.customAttributes[0].value = 1;
                    }
                }

            } catch (e) {
                return originalAction();
            }

            return originalAction();
        });
    };
});
