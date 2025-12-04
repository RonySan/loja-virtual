<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'stock',
        'description',
        'active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function stockMovements()
{
    return $this->hasMany(StockMovement::class);
}

    public function getCalculatedStockAttribute()
{
    $in = $this->stockMovements()->where('type', 'in')->sum('quantity');
    $out = $this->stockMovements()->where('type', 'out')->sum('quantity');

    return $in - $out;
}

}
