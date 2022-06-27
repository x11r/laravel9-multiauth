<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Carbon;

class MemberSeeder extends Seeder
{

    public function run()
    {
        // 登録前に削除する
        DB::table('members')->truncate();
        $emailPattern = 'zzzz.xo+%04d@gmail.com';
        $password = '12341234';

        for ($i = 0; $i < 5; $i++) {
            $email = sprintf($emailPattern, $i + 1);
            DB::table('members')->insert([
                'name' => '担当者 その' . ($i +1),
                'email' => $email,
                'password' => Hash::make($password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
