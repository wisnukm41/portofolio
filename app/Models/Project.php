<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'type', 'tags', 'demo', 'git', 'short', 'content', 'priority'];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
