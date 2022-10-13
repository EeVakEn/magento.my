<?php

namespace ICreative\Product\Helper;

class Review extends \Magento\Review\Block\Product\ReviewRenderer
{
    /**
     * Array of available template name
     *
     * @var array
     */
    protected $_availableTemplates = [
        self::FULL_VIEW => 'Magento_Review::helper/summary.phtml',
        self::SHORT_VIEW => 'Magento_Review::helper/summary_short.phtml',
        'myReview' => 'ICreative_Product::review.phtml'
    ];

}
