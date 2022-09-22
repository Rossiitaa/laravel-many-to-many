<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoriesArray = [
            'SPORT', 
            'NEWS', 
            'FOOD', 
            'HOBBY', 
            'HOME',
            'TRAVEL',
        ];

        foreach ($categoriesArray as $category) {
            $newCategory = new Category;
            $newCategory->name = $category;
            $newCategory->color = $faker -> hexcolor();
            $newCategory->save();
        }        
    }
}
