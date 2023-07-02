<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 增加新的資料表、資料表的欄位以及指定的欄位的資料型態
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default(User::ROLE_USER); // 加入角色欄位
            $table->string('address');  //
            $table->integer('cellphone');  //
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 刪除資料庫中的資料表
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
