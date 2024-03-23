<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();

        foreach ($users as $user) {
            $post = Post::factory()->count(1)->create([
                'user_id' => $user->id,
            ])->first();
            PostComment::factory()->count(2)->create([
                'post_id' => $post->id,
                'user_id' => $user->id,
            ])->first();
            PostLike::factory()->count(1)->create([
                'post_id' => $post->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
