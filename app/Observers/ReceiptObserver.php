<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Receipt;

class ReceiptObserver
{
    public function creating(Receipt $receipt)
    {
        $receipt->price = Product::findOrFail($receipt->product_id)->price;
    }

    public function updating(Receipt $receipt)
    {
        $receipt->price = Product::findOrFail($receipt->product_id)->price;
    }
}
