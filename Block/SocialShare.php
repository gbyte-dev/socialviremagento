<?php
namespace MyVendor\SocialShare\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Registry;
use Magento\Store\Model\ScopeInterface;

class SocialShare extends Template
{
    protected $scopeConfig;
    protected $registry;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        Registry $registry,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getConfig($path)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

    // SIZE LOGIC FIXED
    public function getSizeData()
    {
        $size = $this->getConfig('socialshare/general/size') ?? 'medium';
        if ($size == 'small') return ['box' => 35, 'icon' => 16];
        if ($size == 'large') return ['box' => 55, 'icon' => 26];
        return ['box' => 45, 'icon' => 22]; 
    }
}