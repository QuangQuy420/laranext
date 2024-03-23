<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postComments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function scopeGetAllInfoPost($query, $userId)
    {
        return $query
            ->leftJoin('users', 'posts.user_id', 'users.id')
            ->leftJoin('post_likes', 'posts.id', 'post_likes.post_id')
            ->leftJoin('post_comments', 'posts.id', 'post_comments.post_id')
            ->select(
                'posts.id',
                'posts.user_id',
                'posts.content',
                'users.name',
                DB::raw('COUNT(DISTINCT post_likes.id) as total_like'),
                DB::raw('COUNT(DISTINCT post_comments.id) as total_comment'),
                DB::raw(
                    '(
                        SELECT type_like 
                        FROM post_likes
                        WHERE post_likes.post_id = posts.id 
                            AND post_likes.user_id = ?
                        LIMIT 1
                    ) AS type_like'
                ),
                DB::raw(
                    '(
                        SELECT type_like 
                        FROM post_likes
                        WHERE post_likes.post_id = posts.id
                            AND post_likes.type_like = 3
                        LIMIT 1
                    ) AS type_like_1'
                ),
                DB::raw(
                    '(
                        SELECT comment 
                        FROM post_comments
                        WHERE post_comments.post_id = posts.id 
                        ORDER BY post_comments.id 
                        LIMIT 1
                    ) AS comment_display'
                ),
                DB::raw(
                    '(
                        SELECT name 
                        FROM users 
                        JOIN post_comments ON users.id = post_comments.user_id AND post_comments.post_id = posts.id 
                        ORDER BY post_comments.id
                        LIMIT 1
                    ) AS user_comment_display'
                ),
            )
            ->groupBy('posts.id', 'users.id', 'post_comments.post_id')
            ->setBindings([$userId]);
    }
}
