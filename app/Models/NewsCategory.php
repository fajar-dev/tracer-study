<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsCategory extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'news_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];
}
