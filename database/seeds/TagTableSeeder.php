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
        $t->name = "-";
        $t->save();

        $t2 = new Tag;
        $t2->name = "Serious";
        $t2->save();

        $t3 = new Tag;
        $t3->name = "Story";
        $t3->save();

        $t4 = new Tag;
        $t4->name = "Cooking";
        $t4->save();

        $t5 = new Tag;
        $t5->name = "Coding";
        $t5->save();

        $t6 = new Tag;
        $t6->name = "Golf";
        $t6->save();

        $t7 = new Tag;
        $t7->name = "Music";
        $t7->save();

        $t8 = new Tag;
        $t8->name = "Funny";
        $t8->save();
    }
}
