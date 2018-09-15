<?php

use App\Page;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $pages = range(1, 10);
        $order = range(1, 10);
        $names = [
            [
                'name' => 'Card',
                'codename' => 'card'
            ],
            [
                'name' => 'Content',
                'codename' => 'content'
            ],
            [
                'name' => 'Message',
                'codename' => 'message'
            ]
        ];

        for($i = 0; $i < 40; $i++) {
            $chunk = array_merge([
                'page_id' => $faker->randomElement($pages),
                'order' => $faker->randomElement($order)
            ], $faker->randomElement($names));

            DB::table('components')->insert($chunk);
        }
    }
}
