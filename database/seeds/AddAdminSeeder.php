<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'Admin User',
            'user_type' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
            'title' => 'Admin User',
        ]);
    }
}
