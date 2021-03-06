<?php

use Illuminate\Database\Seeder;

class CateringTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('caterings')->insert([
            'name' => "Real Sonny's Kitchen",
            'description' => 'A Real Antillean Chef',
            'active' => 1,
            'adminId' => 1,
            'image' => '15723484461.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
