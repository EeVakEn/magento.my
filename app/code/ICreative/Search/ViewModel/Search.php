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
    private CategoryCollectionFactory $_categoriesCollectionFactory;
    private ProductCollectionFactory $_productCollectionFactory;
    private ProductFactory $_productFactory;
    private Image $_imageHelper;

    public function __construct(Image                     $imageHelper,
                                CategoryCollectionFactory $categoriesCollectionFactory,
                                ProductCollectionFactory  $productCollectionFactory,
                                ProductFactory            $productFactory

    )
    {
        $this->_imageHelper = $imageHelper;
        $this->_categoriesCollectionFactory = $categoriesCollectionFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_productFactory = $productFactory;
    }


    /**
     * @throws LocalizedException
     */
    public function getAllCategories(): CategoryCollection
    {
        $collection = $this->_categoriesCollectionFactory->create();
        $collection->addAttributeToSelect('name');
        $collection->addAttributeToSelect('id');
        $collection->addAttributeToFilter('level', 2);

        return $collection;
    }


    public function getProductCollectionByCategories($ids): ProductCollection
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
//        $collection->addAttributeToFilter('sku', '111111');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setPageSize(12);
//        $collection->addAttributeToFilter('name', array('like' => 'ABC%')); // содержит
        return $collection;
    }

    public function getProductImageUrl($product): string
    {
//        return $this->_helperProduct->getThumbnailUrl($prod);
        return $this->_imageHelper->init($product, 'product_thumbnail_image')->getUrl();
    }
}
