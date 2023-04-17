<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'type', 'tags', 'demo', 'git', 'short', 'content', 'priority'];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function one_image():HasOne
    {
        return $this->hasOne(Image::class);
    }
}
