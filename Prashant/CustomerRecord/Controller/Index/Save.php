<?php
/**
 * Copyright © prashant All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Prashant\CustomerRecord\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Prashant\CustomerRecord\Model\RecordFactory;
use Prashant\CustomerRecord\Api\RecordRepositoryInterface;

class Save extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * @var RecordFactory
     */
    protected $recordFactory;

    /**
     * @var RecordRepositoryInterface
     */
    protected $recordRepository;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     * @param RequestInterface $request
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $resultRedirectFactory
     * @param RecordFactory $recordFactory
     * @param RecordRepositoryInterface $recordRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        RequestInterface $request,
        ManagerInterface $messageManager,
        RedirectFactory $resultRedirectFactory,
        RecordFactory $recordFactory,
        RecordRepositoryInterface $recordRepository
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->request = $request;
        $this->messageManager = $messageManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->recordFactory = $recordFactory;
        $this->recordRepository = $recordRepository;
    }

    /**
     * Save Data in Customer Record
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $post = (array) $this->request->getPostValue();
        if (!empty($post)) {
            $booking = $this->recordFactory->create();
            $booking->setName($post['name']);
            $booking->setEmail($post['email']);
            $booking->setCountry($post['country']);
            $this->recordRepository->save($booking);
            $this->messageManager->addSuccessMessage(__('Your booking has been saved!'));
        } else {
            $this->messageManager->addErrorMessage(__('Something went wrong. Please try again.'));
        }
        return $this->resultRedirectFactory->create()->setPath('customerrecord/index/booking');
    }
}
