<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = new Tag;
        $t->name = "Funny";
        $t->save();

        $t2 = new Tag;
        $t2->name = "Serious";
        $t2->save();

        $t3 = new Tag;
        $t3->name = "Story";
        $t3->save();
    }
}
