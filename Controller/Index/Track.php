<?php
namespace MyVendor\SocialShare\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use MyVendor\SocialShare\Model\SocialShareLogFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Store\Model\StoreManagerInterface;

class Track extends Action implements HttpPostActionInterface
{
    protected $resultJsonFactory;
    protected $logFactory;
    protected $storeManager;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        SocialShareLogFactory $logFactory,
        StoreManagerInterface $storeManager
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->logFactory = $logFactory;
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $data = $this->getRequest()->getParams(); 

        try {

            if (!$data || !isset($data['platform']) || !isset($data['page_url'])) {
                return $result->setData(['success' => false, 'message' => 'Missing data']);
            }

            $log = $this->logFactory->create();
            $log->setData([
                'platform'    => $data['platform'] ?? 'unknown',
                'action'      => $data['action'] ?? 'share',
                'entity_type' => $data['entity_type'] ?? 'other',
                'entity_id'   => !empty($data['entity_id']) ? $data['entity_id'] : null,
                'entity_name' => !empty($data['entity_name']) ? $data['entity_name'] : null,
                'page_url'    => $data['page_url'],
                'store_id'    => $this->storeManager->getStore()->getId(),
                'customer_id' => $data['customer_id'] ?? null,
                'visitor_id'  => $data['visitor_id'] ?? null,
                'ip_address'  => $this->getRequest()->getClientIp(),
            ]);
            
            $log->save();
            return $result->setData(['success' => true, 'id' => $log->getId()]);
            
        } catch (\Exception $e) {

            return $result->setData(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}