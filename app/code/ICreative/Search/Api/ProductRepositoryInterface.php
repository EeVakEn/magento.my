<?php
namespace ICreative\Search\Api;

interface ProductRepositoryInterface
{
    /**
     * GET Products
     * @param string $query
     * @param int $cat_id
     * @return ICreative\Search\Api\Data\ProductInterface[]
     * @api
     */
    public function getList(string $query, int $cat_id);
}
