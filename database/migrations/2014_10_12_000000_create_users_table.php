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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('emtype');
            $table->string('roleid');
            $table->string('emimg')->nullable();
            $table->string('emid');
            $table->string('pnid');
            $table->string('fullname');
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('bankimg')->nullable();
            $table->string('bankname')->nullable();
            $table->string('banknumber')->nullable();
            $table->string('salary')->nullable();
            $table->string('taxname')->nullable();
            $table->string('department')->nullable();
            $table->date('startwork')->nullable();
            $table->string('email')->unique();
            $table->string('phonenumber')->unique();
            $table->string('password');
            $table->softDeletes();
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
};
