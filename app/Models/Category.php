<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use illuminate\support\str;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable =[ 'name', 'slug', 'icon']; // pengguna dapat memodifikasi data ini.

    public function shoes(): HasMany
    {
        return $this->hasMany(Shoe::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $value;
    }
}
