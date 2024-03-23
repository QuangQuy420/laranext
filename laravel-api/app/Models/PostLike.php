<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_like',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGetLikedUser($query, $id)
    {
        return $query
            ->leftJoin('posts', 'post_likes.id', 'posts.id')
            ->where('post_likes.post_id', $id)
            ->leftJoin('users', 'post_likes.user_id', 'users.id')
            ->select(
                'users.name',
                'post_likes.user_id',
            );
    }
}
