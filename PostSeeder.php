<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Postingan Pertama',
            'content' => 'My First Post.',
            'image' => null,
            'user_id' => 1,
            'category_id' => 1,
        ]);
    }
}
