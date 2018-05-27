<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('admin123'),
        ]);
        
        $user->save();
    }
}
