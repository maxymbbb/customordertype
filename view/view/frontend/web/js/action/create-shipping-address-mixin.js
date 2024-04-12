define([
  'jquery',
  'mage/utils/wrapper'
], function($, wrapper) {
  'use strict';

  return function (createShippingAddressAction) {
    return wrapper.wrap(createShippingAddressAction, function(originalAction, addressData) {
      if (addressData.custom_attributes === undefined) {
        return originalAction();
      }

      if(addressData.custom_attributes['custom_order_type'] !== undefined) {

      }

      return originalAction();
    });
  };
});
