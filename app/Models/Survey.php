<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
