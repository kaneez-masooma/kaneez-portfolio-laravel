<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'issuer', 'date_earned', 'credential_url', 'sort_order'];

    protected $casts = [
        'date_earned' => 'date',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('date_earned');
    }
}
