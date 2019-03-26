<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
         'username' => $faker->username,
         'firstname'=>$faker->firstname,
         'lastname'=>$faker->lastname,
         'address'=>$faker->address,
         'city'=>$faker->city,
         'house_number'=>$faker->buildingNumber,
         'postal_code'=>$faker->buildingNumber,
         'email' => $faker->unique()->safeEmail,
        
        //'status'=>$faker->status,
        'password' => bcrypt('admin123'), // password
        'remember_token' => Str::random(10),
    ];
});
