<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departemens')->insert([
           'name' => 'IT'
        ]);

        DB::table('departemens')->insert([
           'name' => 'Finance'
        ]);

        DB::table('departemens')->insert([
           'name' => 'Marketing'
        ]);
    }
}
