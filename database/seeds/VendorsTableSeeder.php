<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            ['vname' => 'vendor1', 'vaddress' => 'sln terminus 28-12-13/6 vskp ','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['vname' => 'vendor2', 'vaddress' => 'nkn terminus 38-12-13/6 vzm','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['vname' => 'vendor3', 'vaddress' => 'jjn terminus 18-12-13/6 pvp','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['vname' => 'vendor4', 'vaddress' => 'lmn terminus 88-12-13/6 pvp','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['vname' => 'vendor5', 'vaddress' => 'spn terminus 98-12-13/6 pvp','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}
