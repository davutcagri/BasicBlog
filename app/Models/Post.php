<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; //Database table name
    protected $fillable = ['user_id', 'title', 'body']; //Fillable variables

    //Get author information
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
