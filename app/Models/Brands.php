<?php

namespace App\Models;

use illuminate\Support\str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brands extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'logo',
    ];

    public function setNameAttribute($value)
    {
        $this->attribute['name'] = $value;
        $this->attribute['slug'] = Str::slug($value);
    }

    public function shoes(): HasMany{
        return $this->HasMany(Shoes::class);
    }
}
