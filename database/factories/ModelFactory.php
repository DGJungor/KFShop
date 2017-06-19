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


$factory->define(App\Admin\Type::class, function (Faker\Generator $faker) {
    return [
        'pid' => $faker->numberBetween(0,10),
        'name' => $faker->safeHexColor,
        'path' => $faker->numberBetween(0,10),
    ];
});

$factory->define(App\Admin\Good::class, function (Faker\Generator $faker) {
	$typeid = \App\Admin\Type::lists('id')->toArray();
    return [
        'typeid' => $faker->randomElement($typeid),
        'goodname' => $faker->city,
        'state' => random_int(0,1),
        'buy' => random_int(0,10),
        'brand' => $faker->country,
        'suit' => $faker->country,
        'makein' => $faker->country,
        'describe' => $faker->text(40),
    ];
});

$factory->define(App\Admin\UserInfo::class, function (Faker\Generator $faker) {
    return [
        'username' =>$faker->name,
        'realname' =>$faker->name,
        'email' =>$faker->safeEmail,
        'tel' =>$faker->phoneNumber,
        'sex' =>$faker->numberBetween(1,2),
        'id_number' =>$faker->ipv4,
        'answer' =>$faker->word,
        'birthday' =>$faker->date('Y-m-d', 'now'),
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

$factory->define(App\Admin\UserRegister::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->safeEmail,
        'tel' => $faker->phoneNumber,
        'password' => bcrypt(str_random(10)),
        'register_ip' => $faker->ipv4,
    ];
});

$factory->define(App\Admin\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'tel' => $faker->phoneNumber,
        'password' => bcrypt(str_random(10)),
        'avatar' =>$faker->url,
        'last_login_ip' => $faker->ipv4,
        'last_login_at' =>\Carbon\Carbon::now(),
    ];
});

$factory->define(App\Admin\Address::class, function (Faker\Generator $faker) {
    $userIds = \App\Admin\UserRegister::lists('id')->toArray();
    return [
        'uid' =>$faker->randomElement($userIds),
        'tel' =>$faker->phoneNumber,
        'consignee' =>$faker->name,
        'province' =>$faker->country,
        'city' =>$faker->city,
        'county' =>$faker->citySuffix,
        'detailed_address' =>$faker->text(10),
    ];
});
