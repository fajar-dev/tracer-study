<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
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

    protected static function boot()
{
    parent::boot();

    static::saving(function ($model) {
        if ($model->isDirty('title')) {
            $slug = Str::slug($model->title);
            $count = 1;

            while (News::where('slug', $slug)->exists()) {
                $slug = Str::slug($model->title) . '-' . $count;
                $count++;
            }

            $model->slug = $slug;
        }
    });
}
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function newsCategory(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
