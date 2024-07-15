<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    // ce qu'on peut modifier
    protected $fillable = ['category_id', 'name', 'description', 'price', ' images'];

    protected $casts = ['images' => 'array',];

    /**
     * Get the user that owns the Product
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,);
    }
}
