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
        DB::table('user')->insert([
            [
                'username' => "admin",
                'password' => bcrypt("admin"),
                'level' => 1,
                'name' => 'Admin'
            ],
            [
                'username' => "nts1997z",
                'password' => bcrypt("admin"),
                'level' => 1,
                'name' => 'Sau Nguyen'
            ]
        ]);
    }
}
