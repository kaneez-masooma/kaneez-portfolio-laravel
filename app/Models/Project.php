<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'image_path',
        'tech_stack', 'github_url', 'live_url',
        'is_featured', 'sort_order',
    ];

    // Laravel automatically json_encode/json_decode this on save/read
    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];

    // Order projects the way you set them in the admin panel
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }
}
