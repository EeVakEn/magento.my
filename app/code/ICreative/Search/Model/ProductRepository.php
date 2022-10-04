<?php
namespace ICreative\Search\Model;
use ICreative\Search\Api\Data\ProductInterfaceFactory;
use ICreative\Search\Api\ProductRepositoryInterface;
use Magento\Catalog\Helper\Image;

class ProductRepository implements ProductRepositoryInterface
{


    /**
     * @var ProductInterfaceFactory
     */
    private $productInterfaceFactory;
    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var Image
     */
    private $imageHelper;

    /**
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param Image $imageHelper
     * @param ProductInterfaceFactory $productInterfaceFactory
     */
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        Image                                           $imageHelper,
        ProductInterfaceFactory                         $productInterfaceFactory
    )
    {
        $this->productRepository = $productRepository;
        $this->imageHelper = $imageHelper;
        $this->productInterfaceFactory = $productInterfaceFactory;
    }

    /**
     * @inheritdoc
     */
    public function getSearchProducts($query, $category_id)
    {
        $productInterface = $this->productInterfaceFactory->create();
        return 'hi';
    }
}
