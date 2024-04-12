<?php

namespace Bonecki\CustomOrderType\Plugin;

class LayoutProcessor
{
    /**
     * Checkout LayoutProcessor after process plugin.
     *
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $processor
     * @param array                                            $jsLayout
     *
     * @return array
     */
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $processor, $jsLayout)
    {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['before-form']['children']['custom_order_type'] = [
            'component' => 'Bonecki_CustomOrderType/js/view/form/element/custom_order_type',
            'config' => [
                'customScope' => 'shippingAddress.extension_attributes',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/checkbox',
                'custom_entry' => null,
            ],
            'dataScope' => 'shippingAddress.custom_attributes.custom_order_type',
            'label' => __('Custom order type'),
            'provider' => 'checkoutProvider',
            'visible' => true,
            'checked' => true,
            'validation' => [],
            'sortOrder' => 925,
            'custom_entry' => null,
        ];



        return $jsLayout;
    }
}
