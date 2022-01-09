<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('users')->truncate(); //menghapus semua isi table users
            DB::beginTransaction();
            User::insert([
                [
                    'name'=>'Admin1',
                    'email'=>'admin1sl@gmail.com',
                    'password'=> bcrypt('admin123'),
                    // 'created_at' => Carbon::now('Asia/Jakarta'),
                    // 'updated_at' => Carbon::now('Asia/Jakarta')
                ],
                [
                    'name'=>'Dev1',
                    'email'=>'dev1sl@gmail.com',
                    'password'=> bcrypt('dev123'),
                    // 'created_at' => Carbon::now('Asia/Jakarta'),
                    // 'updated_at' => Carbon::now('Asia/Jakarta')
                ]]
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info('seeder user => '.$th);
        }
        DB::commit();
    }
}
