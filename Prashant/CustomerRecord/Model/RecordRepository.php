<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Prashant\CustomerRecord\Api\Data\RecordInterface;
use Prashant\CustomerRecord\Api\Data\RecordInterfaceFactory;
use Prashant\CustomerRecord\Api\Data\RecordSearchResultsInterfaceFactory;
use Prashant\CustomerRecord\Api\RecordRepositoryInterface;
use Prashant\CustomerRecord\Model\ResourceModel\Record as ResourceRecord;
use Prashant\CustomerRecord\Model\ResourceModel\Record\CollectionFactory as RecordCollectionFactory;

class RecordRepository implements RecordRepositoryInterface
{

    /**
     * @var ResourceRecord
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var RecordInterfaceFactory
     */
    protected $recordFactory;

    /**
     * @var Record
     */
    protected $searchResultsFactory;

    /**
     * @var RecordCollectionFactory
     */
    protected $recordCollectionFactory;


    /**
     * Connstructor
     * 
     * @param ResourceRecord $resource
     * @param RecordInterfaceFactory $recordFactory
     * @param RecordCollectionFactory $recordCollectionFactory
     * @param RecordSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceRecord $resource,
        RecordInterfaceFactory $recordFactory,
        RecordCollectionFactory $recordCollectionFactory,
        RecordSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->recordFactory = $recordFactory;
        $this->recordCollectionFactory = $recordCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save Record
     */
    public function save(RecordInterface $record)
    {
        try {
            $this->resource->save($record);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the record: %1',
                $exception->getMessage()
            ));
        }
        return $record;
    }

    /**
     * Get Record
     */
    public function get($recordId)
    {
        $record = $this->recordFactory->create();
        $this->resource->load($record, $recordId);
        if (!$record->getId()) {
            throw new NoSuchEntityException(__('Record with id "%1" does not exist.', $recordId));
        }
        return $record;
    }

    /**
     * Get list
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->recordCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Delete
     */
    public function delete(RecordInterface $record)
    {
        try {
            $recordModel = $this->recordFactory->create();
            $this->resource->load($recordModel, $record->getRecordId());
            $this->resource->delete($recordModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Record: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete by ID
     */
    public function deleteById($recordId)
    {
        return $this->delete($this->get($recordId));
    }

    /**
     * Get booking by email
     */
    public function getBookingByEmail($email)
    {
        $collection = $this->recordCollectionFactory->create();
        $collection->addFieldToFilter('email', $email);

        return $collection->getData();
    }
}