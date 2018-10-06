<?php

use Illuminate\Database\Seeder;

class ClassAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('class_addresses')->insert([
        'line1' => '34 Chatfield Road',
        'line2' => 'Wandsworth',
         'town' => 'Wandsworth',
         'county' => 'London',
         'postcode' => 'TW7 5NR',
         'country' => 'UK',
         'createdBy' => 1
     ]);
    }
}
