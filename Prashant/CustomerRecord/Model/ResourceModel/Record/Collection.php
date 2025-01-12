<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Model\ResourceModel\Record;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @var string $_idFieldName
     */
    protected $_idFieldName = 'record_id';

    /**
     * Initialize Record Collection
     */
    protected function _construct()
    {
        $this->_init(
            \Prashant\CustomerRecord\Model\Record::class,
            \Prashant\CustomerRecord\Model\ResourceModel\Record::class
        );
    }
}