<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyResponse extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'survey_responses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'answer'
    ];
}
