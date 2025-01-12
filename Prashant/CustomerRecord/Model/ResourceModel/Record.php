<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Record extends AbstractDb
{

    /**
     * Initialize the ResourceModel.
     * 
     * Defines the main database table and its primary key.
     * 
     * @return void
     */
    protected function _construct()
    {
        $this->_init('prashant_customerrecord_record', 'record_id');
    }
}