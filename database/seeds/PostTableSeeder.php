<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(App\Post::class, 50)->create();
        $p = new Post;
        $p->text = "This is a tag test";
        $p->image_location = "Location";
        $p->user_id = 1;
        $p->save();
    }
}
