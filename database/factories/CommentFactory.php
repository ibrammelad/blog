<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "comment"=>$this->faker->paragraph(1),
            "user_id" =>function(){
                return User::all()->random();},
            "post_id" =>function(){
                return Post::all()->random();},
        ];
    }
}
