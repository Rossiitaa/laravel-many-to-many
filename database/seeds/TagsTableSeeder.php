<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Game',
            'Sport',
            'Music',
            '2022',
            'Boolean',
            'Laravel',
            'LOL',
            'Apple',
            'Microsoft',
        ];

        foreach($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
