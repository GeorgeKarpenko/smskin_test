<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $body = $this->faker->text(2500);
        $string = substr($body, 0, 300); // обрезаем первые 300 символов
        $end = strlen(strrchr($string, ' ')); // длина обрезка 
        $string = substr($string, 0, -$end) . '...'; // убираем обрезок добавляем троеточие
        return [
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->sentence(5),
            'cover_art_image' => 'https://picsum.photos/277/277/?image=41',
            'cover' => 'https://picsum.photos/1110/400/?image=41',
            'description' => $string,
            'body' => $body,
            'number_of_views' => mt_rand(1, 50),
            'number_of_likes' => mt_rand(1, 50),
        ];
    }
}
