<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,5),
        'description' => $faker->realText($faker->numberBetween(50,200)),
        'quote' => $faker->realText($faker->numberBetween(10,20)),    
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,5),
        'description' => $faker->realText($faker->numberBetween(20,30)),
        'title' => $faker->realText($faker->numberBetween(10,20)),    
    ];
});

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,5),
        'project_id' => $faker->numberBetween(1,10),
        'description' => $faker->realText($faker->numberBetween(10,40)),
        'visibility' => $faker->numberBetween(1,2),
        'status' => 0,
        'priority' => $faker->numberBetween(0,1),
        
    ];
});

$factory->define(App\Document::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
    ];
});

