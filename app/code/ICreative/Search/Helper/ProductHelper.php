<?php

namespace ICreative\Search\Helper;


class ProductHelper
{
    private \Magento\Catalog\Helper\Product $helperProduct;
    private \Magento\Framework\Pricing\Helper\Data $priceHelper;
    private \Magento\Catalog\Model\CategoryRepository $categoryRepository;

    public function __construct(
        \Magento\Catalog\Helper\Product           $helperProduct,
        \Magento\Framework\Pricing\Helper\Data    $priceHelper,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository
    )
    {
        $this->priceHelper = $priceHelper;
        $this->helperProduct = $helperProduct;
        $this->categoryRepository = $categoryRepository;
    }
    // TODO (eevaken): Not working(return 0)
    public function formatPrice($price)
    {
        return $this->priceHelper->currency($price, true, false);
    }

    public function getProductImageUrl($product): string
    {
        return $this->helperProduct->getThumbnailUrl($product);
    }

    public function getChildCategories($cat_id)
    {
        $cat = $this->categoryRepository->get($cat_id);
        $subcats = $cat->getChildren(true, true, true);
        return array((string)$cat_id, ...explode(',', $subcats));
    }
}
