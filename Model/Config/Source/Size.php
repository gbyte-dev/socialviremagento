<?php
namespace MyVendor\SocialShare\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
class Size implements ArrayInterface {
    public function toOptionArray() {
        return [
            ['value' => 'small', 'label' => __('Small (35px)')],
            ['value' => 'medium', 'label' => __('Medium (45px)')],
            ['value' => 'large', 'label' => __('Large (55px)')]
        ];
    }
}