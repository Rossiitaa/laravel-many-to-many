<?php

use App\Models\Category;
use App\Models\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $categories = Category::all();
        
        for ($i=0; $i < 50; $i++) { 

            $newPost = new Post();
            $newPost->category_id = $faker->randomElement($categories);
            $newPost->user_id = $faker->randomElement($users)->id;
            $newPost->title = $faker->sentence(3);
            $newPost->content = $faker->text(500);
            $newPost->date = $faker->dateTime();
            $newPost->image = $faker->imageUrl();
            $newPost->save();
        }
    }
}
