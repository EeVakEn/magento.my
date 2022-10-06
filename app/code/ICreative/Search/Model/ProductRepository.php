<?php

namespace ICreative\Search\Model;


use ICreative\Search\Api\ProductRepositoryInterface;
use ICreative\Search\Api\Data\ProductInterfaceFactory;
use ICreative\Search\Helper\ProductHelper;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductRepository implements ProductRepositoryInterface
{

    private \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory;
    private ProductInterfaceFactory $productInterfaceFactory;
    private ProductHelper $helper;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        ProductInterfaceFactory                                        $productInterfaceFactory,
        ProductHelper                                                  $helper
    )
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->productInterfaceFactory = $productInterfaceFactory;
        $this->helper = $helper;
    }


    /**
     * @param string $query
     * @param int $cat_id
     * @return ICreative\Search\Api\Data\ProductInterface[]
     */
    public function getList(string $query, int $cat_id)
    {
        // get product collection entity
        $products = $this->productCollectionFactory->create();
        try {
            // TODO (eevaken): Set attr
            $products->addAttributeToSelect('*');
            if ($cat_id !== 0)
                $products->addCategoriesFilter(['in' => $this->helper->getChildCategories($cat_id)]);

            $products->addAttributeToFilter('name', array('like' => '%' . $query . '%'))
                ->setPageSize(100);
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
                ->setDescription($product->getDescription() ? $product->getDescription() : '')
                ->setPrice($this->helper->formatPrice($product->getPrice()))
                ->setProductUrl($product->getProductUrl())
                ->setImageUrl($this->helper->getProductImageUrl($product))
                ->setCategoriesForSearch($this->helper->getChildCategories($cat_id));
            $result[] = $productInterface;
        }

        return $result;
    }
}
