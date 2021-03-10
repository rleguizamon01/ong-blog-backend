<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['id','post_id','email','ip','body'];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
