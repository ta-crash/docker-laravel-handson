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
            $table->increments('id');
            $table->string('display_name', 20);
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('name');
            $table->string('name_kana', 200);
            $table->string('gender');
            $table->date('birthday')->default('2000-01-01');
            $table->unsignedInteger('height');
            $table->unsignedInteger('weight');
            $table->string('blood_type');
            $table->string('tel', 20);
            $table->string('zip_code', 10);
            $table->string('prefecture');
            $table->string('address', 100);
            $table->string('address_building', 100)->nullable();
            $table->unsignedInteger('plan_id');
            $table->string('email_verify_token', 191)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('email_verify_token');
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
