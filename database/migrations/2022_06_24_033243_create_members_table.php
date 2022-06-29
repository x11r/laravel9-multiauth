<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable('ログイン用メールアドレス');
			$table->string('url')->unique()->comment('アクセスできるURL');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('password_plain')->nullable();
            $table->rememberToken()->comment('remember_token');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
