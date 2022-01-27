<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $product = 'products';
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });

        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return $query->whereHas('category', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     });
        // });

        // With arrow function
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            )
        );

        // $query->when($filters['sortby'] ?? false, function ($query) {
        //     return $query;
        // });
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
