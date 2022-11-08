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
        Schema::create('notify_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('pnid');
            $table->integer('type')->comment('ประเภทการลา |1 ลากิจ |2 ลาพักร้อน |3 ลาป่วย');
            $table->boolean('status_read')->default(0);
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
        Schema::dropIfExists('notify_users');
    }
};
