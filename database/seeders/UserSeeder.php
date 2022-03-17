<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u_defaults = [
            [
                'name' => 'Pedro cliente',
                'email' => 'pedrocliente@mail.com',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Alberto admin',
                'email' => 'albertoadmin@mail.com',
                'password' => bcrypt('12345'),
                'role' => true
            ],
        ];

        foreach ($u_defaults as $user) {
            User::firstOrCreate(['name' => $user['name']],$user);
        }
    }
}
