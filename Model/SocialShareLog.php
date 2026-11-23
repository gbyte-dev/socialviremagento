<?php
namespace MyVendor\SocialShare\Model;

use Magento\Framework\Model\AbstractModel;

class SocialShareLog extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\MyVendor\SocialShare\Model\ResourceModel\SocialShareLog::class);
    }
}