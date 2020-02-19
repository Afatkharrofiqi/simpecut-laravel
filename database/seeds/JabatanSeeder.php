<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatans')->insert([
            'name' => 'Kepala Biro Hukum'
        ]);

        DB::table('jabatans')->insert([
            'name' => 'Kepala Biro Keuangan'
        ]);

        DB::table('jabatans')->insert([
            'name' => 'Kepala Biro IT'
        ]);
    }
}
