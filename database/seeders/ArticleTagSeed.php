<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleTagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagIds = \App\Models\Tag::factory(10)->create()->pluck('id')->toArray();
        $articles = Article::all();
        // $tagIds = Tag::pluck('id')->toArray();

        $count = mt_rand(1, count($tagIds) - 1);
        foreach ($articles as $key => $article) {
            $numbers = array();
            $tagIdsRandom = array();
            while ( count($numbers) < $count ) {
                $x = mt_rand(1, count($tagIds) - 1);
                if ( !in_array($x,$numbers) ) {
                    $numbers[] = $x;
                    $tagIdsRandom []= $tagIds[$x];
                }
            }
            $tags = Tag::find($tagIdsRandom);
            $article->tags()->attach($tags);
        }
    }
}
