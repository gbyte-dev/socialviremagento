<?php
namespace MyVendor\SocialShare\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;

class Platforms implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'facebook', 'label' => __('Facebook')],
            ['value' => 'twitter', 'label' => __('X (Twitter)')],
            ['value' => 'linkedin', 'label' => __('LinkedIn')],
            ['value' => 'pinterest', 'label' => __('Pinterest')],
            ['value' => 'telegram', 'label' => __('Telegram')],
            ['value' => 'whatsapp', 'label' => __('WhatsApp')],
            ['value' => 'copy', 'label' => __('Copy Link')]
        ];
    }
}