<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'date_written',
        'featured_image',
        'votes_up',
        'votes_down',
        'user_id',
        'category_id'
    ];
}
