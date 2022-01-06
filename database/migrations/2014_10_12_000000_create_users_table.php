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
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('');
            $table->string('cover')->default('');
            $table->tinyInteger('gender');
            $table->timestamp('date_of_birth')->nullable();
            $table->integer('age');
            $table->string('about')->default('');
            $table->tinyInteger('status');
            $table->string('sound')->default(1234);
            $table->boolean('is_allow_private')->default(false);
            $table->string('ip_address');
            $table->string('time_zone');
            $table->string('country');
            $table->integer('room_id')->default(1);
            $table->integer('rank')->default(0);
            $table->integer('level')->default(0);
            $table->integer('points')->default(0);
            $table->boolean('is_bot')->default(false);
            $table->boolean('is_mute')->default(false);
            $table->boolean('is_kick')->default(false);
            $table->boolean('is_ban')->default(false);
            $table->string('mute_message')->nullable();
            $table->string('kick_message')->nullable();
            $table->string('ban_message')->nullable();
            $table->rememberToken();
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
