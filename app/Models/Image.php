<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'project_id', 'priority'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public $timestamps = false;
}
