<?php
namespace MyVendor\SocialShare\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
class Animation implements ArrayInterface {
    public function toOptionArray() {
        return [
            ['value' => 'scale', 'label' => __('Scale (Zoom)')],
            ['value' => 'slide', 'label' => __('Slide Right')],
            ['value' => 'glow', 'label' => __('Glow Shadow')]
        ];
    }
}