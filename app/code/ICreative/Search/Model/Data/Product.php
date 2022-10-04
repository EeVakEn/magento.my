<?php

namespace ICreative\Search\Model\Data;

use ICreative\Search\Api\Data\ProductInterface;
use Magento\Framework\DataObject;

class Product extends DataObject implements ProductInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->getData('sku');
    }

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku($sku)
    {
        return $this->setData('sku', $sku);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getData('description');
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData('description', $description);
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->getData('price');
    }

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice($price)
    {
        return $this->setData('price', $price);
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->getData('image');
    }

    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData('image', $image);
    }

}
