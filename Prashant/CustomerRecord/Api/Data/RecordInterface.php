<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Api\Data;

interface RecordInterface
{

    const EMAIL = 'email';
    const NAME = 'name';
    const RECORD_ID = 'record_id';
    const COUNTRY = 'country';

    /**
     * Get record_id
     * @return string|null
     */
    public function getRecordId();

    /**
     * Set record_id
     * @param string $recordId
     * @return \Prashant\CustomerRecord\Record\Api\Data\RecordInterface
     */
    public function setRecordId($recordId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Prashant\CustomerRecord\Record\Api\Data\RecordInterface
     */
    public function setName($name);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Prashant\CustomerRecord\Record\Api\Data\RecordInterface
     */
    public function setEmail($email);

    /**
     * Get country
     * @return string|null
     */
    public function getCountry();

    /**
     * Set country
     * @param string $country
     * @return \Prashant\CustomerRecord\Record\Api\Data\RecordInterface
     */
    public function setCountry($country);
}