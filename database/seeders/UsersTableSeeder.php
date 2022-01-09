<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'name'=>'Admin1',
            'email'=>'admin1sl@gmail.com',
            'password'=> bcrypt('admin123'),
            ]
        );
    }
}
