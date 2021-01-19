<?php

use Illuminate\Database\Seeder;
use \App\Models\Entities\Core\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('password'),
        ]);
    }
}
