<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('components')->truncate();
        DB::table('pages')->truncate();
        DB::table('props')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->call([
            PagesTableSeeder::class,
            ComponentsSeeder::class,
            PropsSeeder::class
        ]);
    }
}
