<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);

        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::all();

        $posts->each(
            function ($post) {
                $post->categories()->attach(
                    // $categories->each(function ($category) {})->pluck('id')
                    random_int(1, 6)
                );
            }
        );

        $posts->each(
            function ($post) {
                $post->tags()->attach(
                    random_int(1, 10)
                );
            }
        );
    }
}
