<?php
namespace MyVendor\SocialShare\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

class EntityLink extends Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['entity_name']) && isset($item['page_url'])) {
                    $name = $item['entity_name'];
                    $url = $item['page_url'];
                    

                    if (empty($name)) {
                        $name = 'N/A';
                    }


                    $item['entity_name'] = '<a href="'.$url.'" target="_blank" title="Open Page">'.$name.'</a>';
                }
            }
        }
        return $dataSource;
    }
}