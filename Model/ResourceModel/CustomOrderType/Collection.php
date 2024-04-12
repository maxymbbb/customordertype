<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Model\ResourceModel\CustomOrderType;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'customordertype_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Bonecki\CustomOrderType\Model\CustomOrderType::class,
            \Bonecki\CustomOrderType\Model\ResourceModel\CustomOrderType::class
        );
    }
}

