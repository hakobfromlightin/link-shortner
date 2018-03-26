<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::statement("SET foreign_key_checks = 0");
        DB::table('users')->truncate();
        DB::statement("SET foreign_key_checks = 1");

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
