<?php
namespace MyVendor\SocialShare\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;

class Shape implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'circle', 'label' => __('Circle')],
            ['value' => 'square', 'label' => __('Square')]
        ];
    }
}