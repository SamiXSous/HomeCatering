<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Johny',
            'email' => 'Johny@Cake.An',
            'email_verified_at' => '2019-10-15 22:21:05',
            'role' => 2,
            'password' => bcrypt('6^t8ac6JE4Wb'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Samson',
            'email' => 'SamsonV.Evertsz@Gmail.com',
            'email_verified_at' => '2019-10-15 22:21:05',
            'role' => 3,
            'password' => bcrypt('4^75qwJrl!KS'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'GreenMeister',
            'email' => 'Green@Meister.nl',
            'email_verified_at' => '2019-10-26 12:02:24',
            'role' => 2,
            'password' => bcrypt('Qx9F9Z*t7Nl$'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
