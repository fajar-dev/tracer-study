<?php

namespace App\Models;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyResponse extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'survey_responses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'survey_id',
        'answer'
    ];

    protected $casts = [
        'answer' => 'array',
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
