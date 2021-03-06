<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = "product_id";
    protected $fillable = [
        'product_id',
        'name_product',
        'thumbnail',
        'category',
        'weight',
        'price',
        'stock',
        'description',
        'img'
    ];

    public function product()
    {
        return $this-> belongsTo(Product::class);
    }
}
