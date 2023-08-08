<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'slug', 'parent_id'];

    // Define the relationship for sub-categories (nested categories)

    // Define the relationship for parent category (one-to-many inverse)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    // Define the relationship for products belonging to this category
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
