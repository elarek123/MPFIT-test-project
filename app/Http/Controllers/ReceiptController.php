<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use App\Http\Resources\ReceiptResource;
use App\Models\Receipt;
use App\Services\ReceiptService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReceiptController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index() : AnonymousResourceCollection
    {
        return ReceiptResource::collection(Receipt::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReceiptRequest $request) : ReceiptResource
    {
        return ReceiptResource::make(Receipt::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt) : ReceiptResource
    {
        return ReceiptResource::make($receipt);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReceiptRequest $request, Receipt $receipt)
    {
        $receipt->update($request->validated());
        return ReceiptResource::make($receipt);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipt $receipt) : bool|null
    {
        return $receipt->delete();
    }
}
