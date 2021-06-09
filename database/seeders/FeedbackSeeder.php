<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedback')->insert($this->getData());
    }

    public function getData():array
    {

        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->name,
                'order' => $faker->sentence(100),
                'created_at' => now(),
                'updated_at' => now()
            ];

        }
        return $data;
    }
}
