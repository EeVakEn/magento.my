<?php

namespace ICreative\Search\Helper;


class ProductHelper
{
    private \Magento\Catalog\Helper\Product $productHelper;
    private \Magento\Catalog\Helper\Image $imageHelper;
    private \Magento\Framework\Pricing\Helper\Data $priceHelper;
    private \Magento\Catalog\Model\CategoryRepository $categoryRepository;

    public function __construct(
        \Magento\Catalog\Helper\Product           $productHelper,
        \Magento\Catalog\Helper\Image             $imageHelper,
        \Magento\Framework\Pricing\Helper\Data    $priceHelper,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository
    )
    {
        $this->productHelper = $productHelper;
        $this->priceHelper = $priceHelper;
        $this->imageHelper = $imageHelper;
        $this->categoryRepository = $categoryRepository;
    }

    // TODO (eevaken): Not working(return 0)
    public function formatPrice($price)
    {
        return $this->priceHelper->currency($price, true, false);
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
