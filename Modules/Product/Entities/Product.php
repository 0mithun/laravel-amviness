<?php

namespace Modules\Product\Entities;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Attribute\Entities\AttributeValue;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Illuminate\Support\Str;
use Modules\Wishlist\Entities\Wishlist;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }

    /**
     * Set the Product slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute(string $value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     *  Get the category that owns the product
     * .
     *  @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     *  Get the brand that owns the product
     * .
     *  @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Get the galleries for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    /**
     * Get the attributes for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes()
    {
        return $this->belongsToMany(AttributeValue::class);
    }

    /**
     * Get the orderDetails for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    /**
     * Get the wishlists for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }




    public function scopeRelatedProducts($query, $count = 10, $inRandomOrder = true)
    {
        $query = $query->where('category_id', $this->category_id);

        if ($inRandomOrder) {
            $query->inRandomOrder();
        }

        return $query->take($count);
    }
}
