<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            
            $newPost = new Post();
            $newPost->title = "Titolo Articolo " . $i;
            $newPost->content = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure vitae blanditiis ab velit officiis, cupiditate perspiciatis earum quas voluptatibus ducimus accusantium neque recusandae repellendus illo repellat odio, temporibus eligendi alias numquam delectus necessitatibus illum voluptatum? Dolore exercitationem cum ullam nemo deleniti suscipit voluptas! Doloribus, ullam nobis facilis non expedita distinctio rem natus voluptatem impedit dolore et vel, possimus nulla nisi nesciunt harum in iusto architecto enim soluta placeat quisquam. Laboriosam explicabo molestias consequatur reiciendis enim consequuntur voluptatum ad, recusandae itaque fuga maiores magnam illo repellat saepe accusamus veniam soluta, ipsa fugiat culpa unde asperiores officiis commodi quisquam corrupti. Quidem, illum.";
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();
        } 
    }
}
