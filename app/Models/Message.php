<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'content',
    ];
}
