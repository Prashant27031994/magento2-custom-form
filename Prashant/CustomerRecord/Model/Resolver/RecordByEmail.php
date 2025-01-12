<?php

namespace Prashant\CustomerRecord\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Prashant\CustomerRecord\Api\RecordRepositoryInterface;

class RecordByEmail implements ResolverInterface
{
    /**
     * @var RecordRepositoryInterface
     */
    protected $recordRepository;

    /**
     * Constuctor
     * 
     * @param RecordRepositoryInterface $recordRepository
     */
    public function __construct(RecordRepositoryInterface $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    /**
     * Resolve method for fetching booking by email.
     *
     * @param Field $field
     * @param Context $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * 
     * @return array
     */
    public function resolve(
        $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (!isset($args['email']) || empty($args['email'])) {
            throw new LocalizedException(__('Email is required.'));
        }

        try {
            return $this->recordRepository->getBookingByEmail($args['email']);
        } catch (\Exception $e) {
            throw new LocalizedException(__('Error fetching record: %1', $e->getMessage()));
        }
    }
}
