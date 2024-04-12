<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Api\Data;

interface CustomOrderTypeSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CustomOrderType list.
     * @return \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface[]
     */
    public function getItems();

    /**
     * Set custom_order_type list.
     * @param \Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

