<?php
namespace MyVendor\SocialShare\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;

class Direction implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'left', 'label' => __('Left')],
            ['value' => 'right', 'label' => __('Right')]
        ];
    }
}