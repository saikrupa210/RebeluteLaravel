<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserting the sample values into the customers table
        DB::table('customers')->insert([
            ['cname' => 'rakesh', 'caddress' => 's.r residency 58-12-13/6 vskp ','cphone' => '8897712523','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['cname' => 'ramesh', 'caddress' => 'n.r residency 68-12-13/6 vzm','cphone' => '9892461389','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['cname' => 'suresh', 'caddress' => 'l.r residency 78-12-13/6 pvp','cphone' => '8896332458','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}
