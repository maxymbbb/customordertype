var config = {
  config: {

    mixins: {
      'Magento_Checkout/js/action/set-shipping-information': {
        'Bonecki_CustomOrderType/js/action/set-shipping-information-mixin': true
      },
      'Magento_Checkout/js/action/create-shipping-address': {
        'Bonecki_CustomOrderType/js/action/create-shipping-address-mixin': true
      },
      'Magento_Checkout/js/action/create-billing-address': {
        'Bonecki_CustomOrderType/js/action/create-billing-address-mixin': true
      },
      'Magento_Checkout/js/action/place-order': {
        'Bonecki_CustomOrderType/js/action/place-order-mixin': true
      },
    }
  }
};
