<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBadgeContent extends Model
{
    // Table associated with the model
    protected $table = 'product_badge_contents';

    // Fillable fields for mass assignment
    protected $fillable = [
        'product_id',
        'targetable_id', // Polymorphic ID
        'targetable_type', // Polymorphic Type
        'badge_type',
        'content',
    ];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship with the Badge model
    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badge_id');
    }

    // Define polymorphic relationship
    public function targetable()
    {
        return $this->morphTo();
    }

    // Define badge types
    const BADGE_TYPES = [
        'new' => 'New Arrival',
        'best_seller' => 'Best Seller',
        'discount' => 'Discount',
        'limited' => 'Limited Edition',
    ];

    // Get the badge content for a product
    public static function getBadgeContent($productId)
    {
        return self::where('product_id', $productId)->get();
    }
}
