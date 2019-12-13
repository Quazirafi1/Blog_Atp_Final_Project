<?php

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
        //
        DB::table('users')-> insert([
            'role_id' => '1',
            'name' => 'QG Admin',
            'username' => 'admin',
            'email' => 'admin@blog.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')-> insert([
            'role_id' => '2',
            'name' => 'QG Author',
            'username' => 'author',
            'email' => 'author@blog.com',
            'password' => bcrypt('author'),
        ]);
    }
}
