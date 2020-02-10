<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contatos;
use Faker\Generator as Faker;

$factory->define(Contatos::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->phoneNumber,
        'datanascimento' => $faker->dateTime,
     
    ];
});
