<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "PHP",
            "Laravel",
            "HTML",
            "CSS",
            "JavaScript",
            "Vue.js"
        ];

        foreach ($tags as $tag) {
            // creare una nuova istanza
            $newTag = new Tag();
            // assegnazione valore
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-');

            //salva nel db
            $newTag->save();
        }
    }
}
