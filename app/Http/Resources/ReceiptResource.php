<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceiptResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'second_name' => $this->second_name,
            'last_name' => $this->last_name,
            'status' => $this->status,
            'comment' => $this->comment,
            'amount' => $this->amount,
            'price' => $this->price,
            'product' => ProductResource::make($this->product),
            'total' => $this->price * $this->amount,
        ];
    }
}
