<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('links')->truncate();
        DB::statement("SET foreign_key_checks = 1");

        factory(App\Link::class, 10)->create();
    }
}
