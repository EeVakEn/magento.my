<?php

namespace ICreative\Search\Api;

use Magento\Framework\Exception\NoSuchEntityException;

interface ProductRepositoryInterface{
    /**
     * @api
     * @param string $query
     * @param string $category_id
     * @return \ICreative\Search\Api\Data\ProductInterface
     * @throws NoSuchEntityException
     */
    public function getSearchProducts($query, $category_id);
}
