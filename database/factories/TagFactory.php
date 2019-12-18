<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Tag;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first()->id,
        'tag_id' => App\Tag::inRandomOrder()->first()->id,
        
    ];
});
