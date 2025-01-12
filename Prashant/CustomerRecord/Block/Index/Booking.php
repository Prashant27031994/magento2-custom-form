<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Block\Index;

use Magento\Directory\Model\ResourceModel\Country\CollectionFactory;

class Booking extends \Magento\Framework\View\Element\Template
{

    /**
     * @var CollectionFactory
     */
    protected $countryCollectionFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CollectionFactory $countryCollectionFactory,
        array $data = []
    ) {
        $this->countryCollectionFactory = $countryCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get form action URL for POST booking request
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('customerrecord/index/save');
    }

    /**
     * Get Counrty list
     *
     * @return array
     */
    public function getCountryCollection()
    {
        return $this->countryCollectionFactory->create()->loadByStore();
    }
}
