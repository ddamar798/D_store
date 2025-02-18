<?php

namespace App\Models;

use illuminate\support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shoes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'thumbnail', 'about', 'price', 'stock', 'is_popular', 'category_id', 'brand_id',];

    public function setNameAttributes($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function brand(): BelongsTo{
        return $this->belongsTo(Brands::class, 'brand_id');
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'category_id');
    }
}
