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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\UserInfo::class, function (Faker\Generator $faker) {
    return [
        'nickname' =>$faker->name,
        'email' =>$faker->safeEmail,
    ];
});

$factory->define(App\UserRegister::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->safeEmail,
        'tel' => $faker->phoneNumber,
        'password' => bcrypt(str_random(10)),
        'register_ip' => $faker->ipv4,
    ];
});

$factory->define(App\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'nickname' => $faker->name,
        'tel' => $faker->phoneNumber,
        'password' => bcrypt(str_random(10)),
        'last_login_ip' => $faker->ipv4,
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    return [
        'tel' =>$faker->phoneNumber,
    ];
});
