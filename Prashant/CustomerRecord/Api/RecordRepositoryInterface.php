<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface RecordRepositoryInterface
{

    /**
     * Save Record
     * @param \Prashant\CustomerRecord\Api\Data\RecordInterface $record
     * @return \Prashant\CustomerRecord\Api\Data\RecordInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Prashant\CustomerRecord\Api\Data\RecordInterface $record
    );

    /**
     * Retrieve Record
     * @param string $recordId
     * @return \Prashant\CustomerRecord\Api\Data\RecordInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($recordId);

    /**
     * Retrieve Record matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Prashant\CustomerRecord\Api\Data\RecordSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Record
     * @param \Prashant\CustomerRecord\Api\Data\RecordInterface $record
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Prashant\CustomerRecord\Api\Data\RecordInterface $record
    );

    /**
     * Delete Record by ID
     * @param string $recordId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($recordId);

    /**
     * Get booking details by email.
     *
     * @param string $email
     * @return BookingInterface[]
     */
    public function getBookingByEmail($email);
}