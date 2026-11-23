<?php
namespace MyVendor\SocialShare\Block\Adminhtml\Dashboard;

use Magento\Backend\Block\Template;
use MyVendor\SocialShare\Model\ResourceModel\SocialShareLog\CollectionFactory;

class Chart extends Template
{
    protected $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

       public function getShareData()
    {
        $collection = $this->collectionFactory->create();
        $collection->getSelect()
            ->reset(\Magento\Framework\DB\Select::COLUMNS)
            ->columns(['platform', 'count' => new \Zend_Db_Expr('COUNT(event_id)')])
            ->group('platform');

        $data = [];
        $labels = [
            'facebook' => 'Facebook',
            'twitter' => 'X (Twitter)',
            'linkedin' => 'LinkedIn',
            'pinterest' => 'Pinterest',
            'telegram' => 'Telegram',
            'whatsapp' => 'WhatsApp',
            'copy' => 'Copy Link'
        ];

        foreach ($collection as $item) {
            $platform = strtolower($item->getPlatform());
            $label = isset($labels[$platform]) ? $labels[$platform] : ucfirst($platform);
            $data[] = ['label' => $label, 'value' => (int)$item->getCount()];
        }
        return json_encode($data);
    }
}