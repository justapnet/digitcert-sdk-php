<?php


namespace DigitCert\Sdk\Resources;


use DigitCert\Sdk\Requests\Product\BrandListRequest;
use DigitCert\Sdk\Requests\Product\ProductListRequest;
use DigitCert\Sdk\Schemes\BrandListScheme;

class Product extends AbstractResource
{
    /**
     * @param BrandListRequest $request
     * @return BrandListScheme
     */
    public function brandList(BrandListRequest $request)
    {
        return $this->callApi('brands', $request, 'get');
    }

    public function productList(ProductListRequest $request)
    {
        return $this->callApi('products', $request, 'get');
    }
}
