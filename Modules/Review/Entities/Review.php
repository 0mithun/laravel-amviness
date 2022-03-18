<?php

namespace Modules\Review\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Review\Database\factories\ReviewFactory::new();
    }

    /**
     * Get the product for the review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the user_reviews for the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_reviews()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user for the review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the product_reviews for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_reviews()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
