<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('login');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique();
            $table->string('ip')->nullable();
            $table->string('phone_code')->unique();
            $table->boolean('phone_confirmed')->default(false);
            $table->string('password');
            $table->float('balance')->default(0);
            $table->float('insurance_balance')->default(0);
            $table->string('last_profit')->nullable();
            $table->string('avatar')->nullable();
            $table->string('referral_link');
            $table->string('referrals')->nullable();
            $table->string('referral_id')->nullable();
            $table->string('tariff_plan')->nullable();
            $table->string('last_login')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->boolean('confirmed_personal_processing')->default(false);
            $table->rememberToken();
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
