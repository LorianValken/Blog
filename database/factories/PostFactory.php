<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $thumbnails = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg'];
        $categories = Category::pluck('id')->toArray(); // => [1,2,3,4,5]
        return [
            'user_id' => 1,
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'thumbnail' => 'uploads/'.fake()->randomElement($thumbnails),
            'category_id' => fake()->randomElement($categories),
        ];
    }
#factory CallBack
   public function configure()
    {   
        $tags = Tag::pluck('id')->toArray(); // => [1,2,3,4,5]
        return $this->afterCreating(function (Post $post) use($tags) {
            $post->tags()->sync(fake()->randomElements($tags, 2));
        });
    }
}
