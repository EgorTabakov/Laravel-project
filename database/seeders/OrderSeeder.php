<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        \DB::table('order')->insert($this->getData());
    }

    public function getData():array
    {

        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'order' => $faker->sentence(100),
                'created_at' => now(),
                'updated_at' => now()
            ];

        }
        return $data;
    }
}
