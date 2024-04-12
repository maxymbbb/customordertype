define([
  'mage/utils/wrapper'
], function(wrapper) {
  'use strict';

  return function (createBillingAddressAction) {
    return wrapper.wrap(createBillingAddressAction, function(originalAction, addressData) {
      if (addressData.custom_attributes === undefined) {
        return originalAction();
      }

      if (addressData.custom_attributes['custom_order_type']) {
      }

      return originalAction();
    });
  };
});
