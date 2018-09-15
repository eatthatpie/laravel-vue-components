<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PropsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $images = [
            '/images/example/1.jpg',
            '/images/example/2.jpg',
            '/images/example/3.jpg',
            '/images/example/4.jpg'
        ];

        $components = DB::table('components')->get();

        foreach($components as $component) {
            $chunks = [];

            if ($component->codename == 'card') {
                $chunks = [
                    [
                        'component_id' => $component->id,
                        'name' => 'body',
                        'value' => '<p>' . $faker->paragraph(10) . '</p>'
                    ],
                    [
                        'component_id' => $component->id,
                        'name' => 'image',
                        'value' => $faker->randomElement($images)
                    ],
                    [
                        'component_id' => $component->id,
                        'name' => 'alt',
                        'value' => $faker->sentence(3)
                    ]
                ];
            }
            else if($component->codename == 'message') {
                $chunks = [
                    [
                        'component_id' => $component->id,
                        'name' => 'body',
                        'value' => '<p>' . $faker->paragraph(10) . '</p>'
                    ],
                    [
                        'component_id' => $component->id,
                        'name' => 'header',
                        'value' => $faker->sentence(5)
                    ]
                ];
            }
            else if($component->codename == 'content') {
                $chunks = [
                    [
                        'component_id' => $component->id,
                        'name' => 'body',
                        'value' => '<p>' . $faker->paragraph(10) . '</p>'
                    ]
                ];
            }

            foreach($chunks as $chunk) {
                DB::table('props')->insert($chunk);
            }
        }
    }
}
