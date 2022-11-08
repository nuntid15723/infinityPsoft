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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stimg');
            $table->string('stid');
            $table->string('stnumber');
            $table->string('stamount');
            $table->string('stunit');
            $table->string('stname');
            $table->string('sttype')->nullable();
            $table->string('stdaybuy')->nullable();
            $table->string('stdescription')->nullable();
            $table->string('stdaystart')->nullable();
            $table->string('stprice')->nullable();
            $table->string('stageuse')->nullable();
            $table->string('stmath')->nullable();
            $table->string('ststatus')->nullable();
            $table->string('stusers')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('stocks');
    }
};
