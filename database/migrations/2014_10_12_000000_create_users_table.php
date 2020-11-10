<?php

use Dev\Application\Utility\UserGender;
use Dev\Application\Utility\UserType;
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
            $table->string('email')->unique()->nullable();
            $table->string('email_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('phone_code')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->enum('gender', UserGender::genderTypesArr())->nullable();
            $table->enum('type', UserType::userTypesArr())->default(UserType::USER);
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
