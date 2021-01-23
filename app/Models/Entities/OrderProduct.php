<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['product_id', 'box_id', 'net_weight',
        'gross_weight', 'place_quantity'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function box() {
        return $this->belongsTo(Box::class, 'box_id', 'id');
    }
}
