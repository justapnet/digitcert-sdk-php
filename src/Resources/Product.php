<?php


namespace DigitCert\Resources;


use DigitCert\Requests\Product\BrandListRequest;
use DigitCert\Requests\Product\ProductListRequest;

class Product extends AbstractResource
{
    public function brandList(BrandListRequest $request)
    {
        return $this->callApi('brands', $request, 'get');
    }

    public function productList(ProductListRequest $request)
    {
        return $this->callApi('products', $request, 'get');
    }
}
