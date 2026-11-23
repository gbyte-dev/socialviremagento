<?php
namespace MyVendor\SocialShare\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SocialShareLog extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('myvendor_social_share_log', 'event_id');
    }
}