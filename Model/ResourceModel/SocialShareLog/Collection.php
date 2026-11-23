<?php
namespace MyVendor\SocialShare\Model\ResourceModel\SocialShareLog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \MyVendor\SocialShare\Model\SocialShareLog::class,
            \MyVendor\SocialShare\Model\ResourceModel\SocialShareLog::class
        );
    }
}