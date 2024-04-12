define([
    'jquery',
    'mage/utils/wrapper',
    'mage/translate'
], function ($, wrapper) {
    'use strict';

    return function (addressModel) {
        return wrapper.wrap(addressModel, function (originalAction) {
            var address = originalAction();

            if (address.customAttributes.custom_order_type_choice == true) {
                address.customAttributes['custom_order_type_choice'] = true;
            }

            if (address['customAttributes']['custom_order_type'] !== undefined) {
                address['customAttributes']['custom_order_type'].label = ' ';
            }

            return address;
        });
    };
});
