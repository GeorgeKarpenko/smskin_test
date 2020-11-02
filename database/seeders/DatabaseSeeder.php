<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory(10)->create();
        $this->call([
            ArticleSeed::class,
            // ArticleTagSeed::class,
            // CommentSeeder::class,
        ]);
        $this->call([
            // ArticleSeed::class,
            ArticleTagSeed::class,
            // CommentSeeder::class,
        ]);
        // \App\Models\Article::factory(20)->create();
        // \App\Models\Comment::factory(10)->create();
    }
}
