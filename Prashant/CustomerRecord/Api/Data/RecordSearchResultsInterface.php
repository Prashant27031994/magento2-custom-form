<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Api\Data;

interface RecordSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Record list.
     * @return \Prashant\CustomerRecord\Api\Data\RecordInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Prashant\CustomerRecord\Api\Data\RecordInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}