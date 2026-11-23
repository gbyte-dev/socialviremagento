<?php
namespace MyVendor\SocialShare\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Cache\Frontend\Pool;

class ClearCacheOnSave implements ObserverInterface
{
    protected $cacheTypeList;
    protected $cacheFrontendPool;

    public function __construct(
        TypeListInterface $cacheTypeList,
        Pool $cacheFrontendPool
    ) {
        $this->cacheTypeList = $cacheTypeList;
        $this->cacheFrontendPool = $cacheFrontendPool;
    }

    public function execute(Observer $observer)
    {

        $changedPaths = $observer->getEvent()->getChangedPaths();
        $shouldClear = false;
        
        foreach ($changedPaths as $path) {
            if (strpos($path, 'socialshare') !== false) {
                $shouldClear = true;
                break;
            }
        }

        if ($shouldClear) {

            $types = ['full_page', 'layout', 'block_html'];
            foreach ($types as $type) {
                $this->cacheTypeList->cleanType($type);
            }
            foreach ($this->cacheFrontendPool as $cacheFrontend) {
                $cacheFrontend->getBackend()->clean();
            }
        }
    }
}