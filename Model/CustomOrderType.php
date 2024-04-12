<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Model;

use Bonecki\CustomOrderType\Api\Data\CustomOrderTypeInterface;
use Magento\Framework\Model\AbstractModel;

class CustomOrderType extends AbstractModel implements CustomOrderTypeInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Bonecki\CustomOrderType\Model\ResourceModel\CustomOrderType::class);
    }

    /**
     * @inheritDoc
     */
    public function getCustomordertypeId()
    {
        return $this->getData(self::CUSTOMORDERTYPE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomordertypeId($customordertypeId)
    {
        return $this->setData(self::CUSTOMORDERTYPE_ID, $customordertypeId);
    }

    /**
     * @inheritDoc
     */
    public function getCustomOrderType()
    {
        return $this->getData(self::CUSTOM_ORDER_TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setCustomOrderType($customOrderType)
    {
        return $this->setData(self::CUSTOM_ORDER_TYPE, $customOrderType);
    }

    /**
     * @inheritDoc
     */
    public function getExOrderId()
    {
        return $this->getData(self::EX_ORDER_ID);
    }

    /**
     * @inheritDoc
     */
    public function setExOrderId($exOrderId)
    {
        return $this->setData(self::EX_ORDER_ID, $exOrderId);
    }
}

