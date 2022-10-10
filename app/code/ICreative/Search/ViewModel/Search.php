<?php

namespace ICreative\Search\ViewModel;

use Magento\Catalog\Model\ResourceModel\Category\Collection as CategoryCollection;
use Magento\Catalog\Model\ResourceModel\Product\Collection as ProductCollection;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

use Magento\Catalog\Helper\Image;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\Catalog\Helper\Product;

class Search implements ArgumentInterface
{
    private \Magento\Directory\Model\Currency $currency;
    private CategoryCollectionFactory $_categoriesCollectionFactory;
    private ProductCollectionFactory $_productCollectionFactory;
    private ProductFactory $_productFactory;
    private Image $_imageHelper;

    public function __construct(
        \Magento\Directory\Model\Currency $currency,
        Image                     $imageHelper,
        CategoryCollectionFactory $categoriesCollectionFactory,
        ProductCollectionFactory  $productCollectionFactory,
        ProductFactory            $productFactory

    )
    {
        $this->currency = $currency;
        $this->_imageHelper = $imageHelper;
        $this->_categoriesCollectionFactory = $categoriesCollectionFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_productFactory = $productFactory;
    }


    /**
     * @throws LocalizedException
     */
    public function getActiveTopCategories(): CategoryCollection
    {
        $collection = $this->_categoriesCollectionFactory->create();
        $collection->addAttributeToSelect(['id', 'name', 'level', 'is_active']);
        $collection->addAttributeToFilter('level', 2);
        $collection->addAttributeToFilter('is_active', true);

        return $collection;
    }

}
