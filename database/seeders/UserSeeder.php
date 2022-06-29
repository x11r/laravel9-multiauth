<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Carbon;

class UserSeeder extends Seeder
{

    public function run()
    {
        // 登録前に削除する
        DB::table('users')->truncate();
        $emailPattern = 'zzzz.xo+%04d@gmail.com';
        $password = '12341234';

        for ($i = 0; $i < 5; $i++) {
            $email = sprintf($emailPattern, $i + 9000);
            DB::table('users')->insert([
                'name' => 'ユーザー その' . ($i +1),
                'email' => $email,
                'password' => Hash::make($password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
