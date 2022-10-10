<?php

namespace ICreative\Search\Model;


use ICreative\Search\Api\ProductRepositoryInterface;
use ICreative\Search\Api\Data\ProductInterfaceFactory;
use ICreative\Search\Helper\ProductHelper;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductRepository implements ProductRepositoryInterface
{

    private \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory;
    private \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus;
    private \Magento\Catalog\Model\Product\Visibility $productVisibility;
    private ProductInterfaceFactory $productInterfaceFactory;
    private ProductHelper $helper;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Attribute\Source\Status         $productStatus,
        \Magento\Catalog\Model\Product\Visibility                      $productVisibility,
        ProductInterfaceFactory                                        $productInterfaceFactory,
        ProductHelper                                                  $helper
    )
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->productStatus = $productStatus;
        $this->productVisibility = $productVisibility;
        $this->productInterfaceFactory = $productInterfaceFactory;
        $this->helper = $helper;
    }


    /**
     * @param string $query
     * @param int $cat_id
     * @return ICreative\Search\Api\Data\ProductInterface[]
     */
    public function getList(string $query, int $cat_id = 0)
    {
        // get product collection entity
        $products = $this->productCollectionFactory->create();
        try {
            $products->addAttributeToSelect(['id', 'sku', 'name', 'price', 'description', 'thumbnail', 'status', 'visibility']);
            if ($cat_id !== 0)
                $products->addCategoriesFilter(['in' => $this->helper->getChildCategories($cat_id)]);

            $products->addAttributeToFilter(array(
                array('attribute' => 'name', 'like' => '%' . $query . '%'),
                array('attribute' => 'sku', 'like' => '%' . $query . '%')
            ))
                ->addAttributeToFilter('status', ['in' => $this->productStatus->getVisibleStatusIds()])
                ->setVisibility($this->productVisibility->getVisibleInSearchIds())
                ->setPageSize(5);
        } catch (NoSuchEntityException $e) {
            throw NoSuchEntityException::singleField('query', $query);
        }

        // create our array with our fields
        $result = array();
        foreach ($products as $product) {
            $productInterface = $this->productInterfaceFactory->create();
            $productInterface
                ->setId($product->getId())
                ->setSku($product->getSku())
                ->setName($product->getName())
                ->setDescription($product->getDescription())
                ->setPrice($this->helper->formatPrice($product))
                ->setProductUrl($product->getProductUrl())
                ->setImageUrl($this->helper->getProductImageUrl($product));
//                ->setCategoriesForSearch($this->helper->getChildCategories($cat_id));
            $result[] = $productInterface;
        }

        return $result;
    }
}
