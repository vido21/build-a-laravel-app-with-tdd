<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'project_id' => function () {
            return factory('App\Project')->create()->id;
        },
        'body' => $faker->sentence
    ];
});
