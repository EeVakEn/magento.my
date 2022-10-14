<?php

namespace ICreative\Product\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Model\Product\Gallery\ReadHandler as GalleryReadHandler;

class Gallery implements ArgumentInterface
{
    protected $galleryReadHandler;
    private \Magento\Catalog\Helper\Image $imageHelper;

    public function __construct(
        GalleryReadHandler $galleryReadHandler,
        \Magento\Catalog\Helper\Image  $imageHelper
    )
    {
        $this->galleryReadHandler = $galleryReadHandler;
        $this->imageHelper = $imageHelper;
    }

    /** Add image gallery to $product */
    public function addGallery($product)
    {
        $this->galleryReadHandler->execute($product);
    }

    public function getImage($product){
        return $this->imageHelper->init($product, 'product_page_image_medium')
            ->setImageFile($product->getImage()) // image,small_image,thumbnail
            ->getUrl();
    }

}
