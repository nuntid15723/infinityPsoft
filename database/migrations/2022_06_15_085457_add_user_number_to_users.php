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
        // Schema::table('users', function (Blueprint $table) {
        //     //
        //     $table->integer('numberPhone');
        //     $table->string('lastName');
        //     $table->integer('PersoncardID');
        //     $table->integer('Banknumber');
        //     $table->text('ImgBank');
        //     $table->integer('Salary');
        //     $table->integer('Sex');
        //     $table->integer('Department');
        //     $table->string('startwork')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
