<?php

namespace App\Models;

use App\Models\User;
use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'news_category_id',
        'slug',
        'title',
        'thumbnail_path',
        'content',
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function NewsCategory(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
