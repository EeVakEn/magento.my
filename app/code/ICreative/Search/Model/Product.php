<?php

namespace ICreative\Search\Model;

class Product extends \Magento\Framework\DataObject implements \ICreative\Search\Api\Data\ProductInterface
{

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @inheritDoc
     */
    public function getSku()
    {
        return $this->getData('sku');
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * @inheritDoc
     */
    public function getPrice()
    {
        return $this->getData('price');
    }

    /**
     * @inheritDoc
     */
    public function getProductUrl()
    {
        return $this->getData('product_url');
    }

    /**
     * @inheritDoc
     */
    public function getImageUrl()
    {
        return $this->getData('image_url');
    }

    /**
     * @inerhitDoc
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * @inerhitDoc
     */
    public function setSku($sku)
    {
        return $this->setData('sku', $sku);
    }

    /**
     * @inerhitDoc
     */
    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    /**
     * @inerhitDoc
     */
    public function setPrice($price)
    {
        return $this->setData('price', $price);
    }

    /**
     * @inerhitDoc
     */
    public function getDescription()
    {
        return $this->getData('description');
    }

    /**
     * @inerhitDoc
     */
    public function setDescription($description)
    {
        return $this->setData('description', $description);
    }

    /**
     * @inerhitDoc
     */
    public function setProductUrl($product_url)
    {
        return $this->setData('product_url', $product_url);
    }

    /**
     * @inerhitDoc
     */
    public function setImageUrl($image_url)
    {
        return $this->setData('image_url', $image_url);
    }

    /**
     * @inerhitDoc
     */
    public function getCategoriesForSearch()
    {
        return $this->getData('search_categories');
    }

    /**
     * @inerhitDoc
     */
    public function setCategoriesForSearch($catArray)
    {
        return $this->setData('search_categories', $catArray);
    }
}
