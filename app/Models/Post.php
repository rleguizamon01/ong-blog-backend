<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getPosts(Request $request)
    {
        $query = Post::with('category', 'user')->latest();

        if ($request->filled('category_query')) {
            $query->where('category_id', $request->get('category_query'));
        }

        $querySearch = $request->get('search_query');
        if ($request->filled('search_query')) {
            $query->where(function ($q) use ($querySearch) {
                $q->where('title', 'like', '%' . $querySearch . '%');
                // ->orWhere('body', 'like', '%' . $querySearch . '%');  // despues agregarlo recordar sacar ; renglon anterior
            });
        }

        return $query->paginate(10);
    }
}
