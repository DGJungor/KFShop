<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'pid' => $faker->numberBetween(0,10),
        'name' => $faker->safeHexColor,
        'path' => $faker->numberBetween(0,10),
    ];
});

$factory->define(App\Good::class, function (Faker\Generator $faker) {
	$typeid = \App\Type::lists('id')->toArray();
    return [
        'typeid' => $faker->randomElement($typeid),
        'goodname' => $faker->city,
        'state' => random_int(0,1),
        'buy' => random_int(0,10),
        'brand' => $faker->country,
        'suit' => $faker->country,
        'makein' => $faker->country,
        'onmarket' => $faker->unixTime,
        'describe' => $faker->text(40),
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->name,
		'email' => $faker->safeEmail,
		'password' => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
	];
});

