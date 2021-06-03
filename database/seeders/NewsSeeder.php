<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData():array
    {

        $faker = Factory::create();
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'category_id'=> 1,
                'title' => $faker->sentence(random_int(3, 10)),
                'image' => $faker->filePath(),
                'author'=> $faker->userName,
                'description' => $faker->text(150),
                'created_at' => now(),
                'updated_at' => now()
            ];

        }
        return $data;
    }
}
