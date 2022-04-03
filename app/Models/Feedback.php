<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'icerik_id',
        'feedback_title',
        'feedback_content',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
