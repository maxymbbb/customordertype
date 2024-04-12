<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Ui\Component\Listing\Column;

class CustomOrderTypeActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    const URL_PATH_DETAILS = 'bonecki_customordertype/customordertype/details';
    const URL_PATH_DELETE = 'bonecki_customordertype/customordertype/delete';
    protected $urlBuilder;
    const URL_PATH_EDIT = 'bonecki_customordertype/customordertype/edit';

    const ORDER_STANDARD = 'standard';
    const ORDER_EXPOSITION = 'exposition';
    const ORDER_TEST = 'test';
    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['customordertype_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'customordertype_id' => $item['customordertype_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'customordertype_id' => $item['customordertype_id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete "${ $.$data.title }"'),
                                'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?')
                            ]
                        ]
                    ];
                }

                if (isset($item['custom_order_type'])) {
                    $types = [self::ORDER_STANDARD, self::ORDER_EXPOSITION, self::ORDER_TEST];
                    $item["custom_order_type"] = $types[$item["custom_order_type"]];
                }
                }
        }

        return $dataSource;
    }
}

