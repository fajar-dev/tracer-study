<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\SurveyResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'surveys';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'thumbnail_path',
        'question',
        'is_active',
        'is_private'
    ];

    protected $casts = [
        'question' => 'array',
    ];
    
    protected static function boot()
{
    parent::boot();

    static::saving(function ($model) {
        if ($model->isDirty('title')) {
            $slug = Str::slug($model->title);
            $count = 1;

            while (Survey::where('slug', $slug)->exists()) {
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

    public function surveyResponse(): HasMany
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
