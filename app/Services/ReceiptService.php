<?php

namespace App\Services;

use App\Http\Resources\ReceiptResource;
use App\Models\Product;
use App\Models\Receipt;

class ReceiptService
{
    public function create(array $data) : ReceiptResource
    {
        $product = Product::findOrFail($data['product_id']);
        $data['price'] = $product->price;
        return ReceiptResource::make(Receipt::create($data));
    }

    public function update(array $data, Receipt $receipt) : ReceiptResource
    {
        if(array_key_exists('product_id', $data)) {
            $data['price'] = Product::findOrFail($data['product_id'])->price;
        }
        return ReceiptResource::make($receipt->update($data));
    }

}
