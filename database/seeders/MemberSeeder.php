<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            $email = sprintf($emailPattern, $i + 8000);
            DB::table('members')->insert([
                'name' => 'メンバー その' . ($i +1),
                'email' => $email,
				'url' => Str::random(10),
                'password' => Hash::make($password),
				'password_plain' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
			sleep(1);
        }
    }
}
