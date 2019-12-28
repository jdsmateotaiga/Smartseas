<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('partner_name')->nullable();
            $table->string('partner_name_address')->nullable();
            $table->string('partner_admin_name')->nullable();
            $table->string('partner_admin_address')->nullable();
            $table->string('partner_admin_gender')->nullable();
            $table->string('partner_admin_position')->nullable();
            $table->string('partner_admin_image')->nullable();
            $table->string('partner_admin_ID')->nullable();
            $table->string('roles')->nullable();
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
