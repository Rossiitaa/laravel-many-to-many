<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $randomTags = Tag::inRandomOrder()->limit(3)->get();
            $post->tags()->attach($randomTags);
        }
    }
}
