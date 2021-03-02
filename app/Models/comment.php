<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content' ,
        'date_written' ,
        'user_id' ,
        'post_id'
    ];
    // من عندي - اجتهاد شخصي لحل المشكلة
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
