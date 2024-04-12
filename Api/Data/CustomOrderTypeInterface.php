<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Api\Data;

interface CustomOrderTypeInterface
{

    const CUSTOMORDERTYPE_ID = 'customordertype_id';
    const EX_ORDER_ID = 'ex_order_id';
    const CUSTOM_ORDER_TYPE = 'custom_order_type';

    /**
     * Get customordertype_id
     * @return string|null
     */
    public function getCustomordertypeId();

    /**
     * Set customordertype_id
     * @param string $customordertypeId
     * @return \Bonecki\CustomOrderType\CustomOrderType\Api\Data\CustomOrderTypeInterface
     */
    public function setCustomordertypeId($customordertypeId);

    /**
     * Get custom_order_type
     * @return string|null
     */
    public function getCustomOrderType();

    /**
     * Set custom_order_type
     * @param string $customOrderType
     * @return \Bonecki\CustomOrderType\CustomOrderType\Api\Data\CustomOrderTypeInterface
     */
    public function setCustomOrderType($customOrderType);

    /**
     * Get ex_order_id
     * @return string|null
     */
    public function getExOrderId();

    /**
     * Set ex_order_id
     * @param string $exOrderId
     * @return \Bonecki\CustomOrderType\CustomOrderType\Api\Data\CustomOrderTypeInterface
     */
    public function setExOrderId($exOrderId);
}

