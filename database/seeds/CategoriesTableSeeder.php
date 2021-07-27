<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Frontend",
            "Backend",
            "UI",
            "UX",
            "Network"
        ];

        foreach($categories as $category){
            
            //nuova istanza
            $newCategory = new Category();

            //asseganzione 
            $newCategory["name"] = $category;
            $newCategory["slug"] = Str::slug($category, '-');

            //salva
            $newCategory->save();
        }
    }
}
