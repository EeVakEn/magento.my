<?php

namespace ICreative\Search\Helper;


class ProductHelper
{
    private \Magento\Catalog\Helper\Product $productHelper;
    private \Magento\Catalog\Helper\Image $imageHelper;
    private \Magento\Framework\Pricing\Helper\Data $priceHelper;
    private \Magento\Catalog\Model\CategoryRepository $categoryRepository;
    private \Magento\Directory\Model\Currency $currency;
    private \Magento\Store\Model\StoreManagerInterface $storeManager;

    public function __construct(
        \Magento\Catalog\Helper\Product            $productHelper,
        \Magento\Catalog\Helper\Image              $imageHelper,
        \Magento\Framework\Pricing\Helper\Data     $priceHelper,
        \Magento\Catalog\Model\CategoryRepository  $categoryRepository,
        \Magento\Directory\Model\Currency          $currency,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->productHelper = $productHelper;
        $this->priceHelper = $priceHelper;
        $this->imageHelper = $imageHelper;
        $this->categoryRepository = $categoryRepository;
        $this->currency = $currency;
        $this->storeManager = $storeManager;
    }


    /**
     * @param \Magento\Catalog\Model\Product $product
     * @return string|float
     */
    public function formatPrice($product)
    {

//        info(var_export($sym, true));
        if ($product->getTypeId() === 'configurable') {
            return $this->priceHelper->currency(
                $product
                    ->getPriceInfo()
                    ->getPrice('regular_price')
                    ->getMinRegularAmount()
                    ->getValue(),
                true, false);
        }
        return $this->priceHelper->currency($product->getPrice(), true, false);

    }

    public function getProductImageUrl($product): string
    {
        return $this->productHelper->getThumbnailUrl($product);
    }

    public function getChildCategories($cat_id)
    {
        $cat = $this->categoryRepository->get($cat_id);
        $subcats = $cat->getChildren(true, true, true);
        return array((string)$cat_id, ...explode(',', $subcats));
    }
}
