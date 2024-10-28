<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'task_id' => 1,
            'user_id' => 1,
            'comment_body' => 'Ensure homepage is mobile-friendly.',
        ]);

        Comment::create([
            'task_id' => 2,
            'user_id' => 2,
            'comment_body' => 'Working on API authentication now.',
        ]);

        Comment::create([
            'task_id' => 3,
            'user_id' => 1,
            'comment_body' => 'SEO improvements are showing results already!',
        ]);

        Comment::create([
            'task_id' => 4,
            'user_id' => 2,
            'comment_body' => 'Database backup scheduled for tomorrow.',
        ]);

        Comment::create([
            'task_id' => 5,
            'user_id' => 1,
            'comment_body' => 'Campaign assets are ready for upload.',
        ]);
    }
}
