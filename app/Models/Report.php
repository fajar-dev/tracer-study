<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'reports';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'file_path',
        'content',
    ];

    protected static function boot()
    {
        parent::boot();
    
        static::saving(function ($model) {
            if ($model->isDirty('title')) {
                $slug = Str::slug($model->title);
                $count = 1;
    
                while (Report::where('slug', $slug)->exists()) {
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
}
