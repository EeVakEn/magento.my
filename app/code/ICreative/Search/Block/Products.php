<?php

namespace ICreative\Search\Block;

use Magento\Framework\View\Element\Template;

class Products extends Template
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;
    public function __construct(
        Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    )
    {
        $this->_productCollectionFactory=$productCollectionFactory;
        parent::__construct($context);
    }

    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => ids]);
        return $collection;
    }
}
