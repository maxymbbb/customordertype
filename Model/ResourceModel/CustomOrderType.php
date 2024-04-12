<?php

declare(strict_types=1);

namespace Bonecki\CustomOrderType\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomOrderType extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('bonecki_customordertype_customordertype', 'customordertype_id');
    }
}

