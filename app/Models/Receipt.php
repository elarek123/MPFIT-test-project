<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Receipt extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'float'
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeWithFullName($query)
    {
        return $query->addSelect(
            DB::raw(' CONCAT(name, " ", second_name, " ", last_name) AS fullname')
        );
    }

    public function scopeWithTotalPrice($query)
    {
        return $query->addSelect(
            DB::raw('price * amount AS total_price')
        );
    }
}
