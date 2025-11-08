<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'featured_image', // Added featured_image to fillable
        'content',
        'status',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'user_id',
    ];

    /**
     * Get the user that owns the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
