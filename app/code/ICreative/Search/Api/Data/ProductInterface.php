<?php

namespace ICreative\Search\Api\Data;



/**
 * @api
 * @since 100.0.2
 */
interface ProductInterface
{

    /**
     * Product id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set product id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);


    /**
     * Product sku
     *
     * @return string
     */
    public function getSku();

    /**
     * Set product sku
     *
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * Product name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set product name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Product price
     *
     * @return string
     */
    public function getPrice();

    /**
     * Set product name
     *
     * @param string $price
     * @return $this
     */
    public function setPrice($price);

    /**
     * Product description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Set product description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Get product url
     *
     * @return string|null
     */
    public function getProductUrl();

    /**
     * Set product url
     *
     * @param string $product_url
     * @return $this
     */
    public function setProductUrl($product_url);

    /**
     * Get image url
     *
     * @return string|null
     */
    public function getImageUrl();

    /**
     * Set image url
     * @param string $image_url
     * @return $this
     */
    public function setImageUrl($image_url);

//    /**
//     * Get categories for search
//     *
//     * @return array
//     */
//    public function getCategoriesForSearch();
//
//    /**
//     * Set categories for search
//     * @param array $catArray
//     * @return $this
//     */
//    public function setCategoriesForSearch($catArray);

}
