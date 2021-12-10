<?php

namespace Application\Models;

class Products
{
    /**
     * List of All products available in system
     *
     * @var object
     */
    public function getProducts()
    {
        $dummyData = file_get_contents("./data/products.json");
        return json_decode($dummyData);
    }
}
