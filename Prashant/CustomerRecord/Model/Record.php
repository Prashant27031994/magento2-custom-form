<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Model;

use Magento\Framework\Model\AbstractModel;
use Prashant\CustomerRecord\Api\Data\RecordInterface;

class Record extends AbstractModel implements RecordInterface
{

    /**
     * Initialize the model.
     *
     * Binds the model to its corresponding ResourceModel for database operations.
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Prashant\CustomerRecord\Model\ResourceModel\Record::class);
    }

    /**
     * Get Record ID.
     *
     * Retrieves the unique identifier of the record.
     *
     * @return int|null
     */
    public function getRecordId()
    {
        return $this->getData(self::RECORD_ID);
    }

    /**
     * Set Record ID.
     *
     * Sets the unique identifier for the record.
     *
     * @param int $recordId
     * @return RecordInterface
     */
    public function setRecordId($recordId)
    {
        return $this->setData(self::RECORD_ID, $recordId);
    }

    /**
     * Get Name.
     *
     * Retrieves the name associated with the record.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     *
     * Sets the name for the record.
     *
     * @param string $name
     * @return RecordInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Email.
     *
     * Retrieves the email associated with the record.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email.
     *
     * Sets the email for the record.
     *
     * @param string $email
     * @return RecordInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get Country.
     *
     * Retrieves the country associated with the record.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * Set Country.
     *
     * Sets the country for the record.
     *
     * @param string $country
     * @return RecordInterface
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }
}