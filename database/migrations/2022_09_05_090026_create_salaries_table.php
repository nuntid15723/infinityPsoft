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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('emid');
            $table->string('fullname');
            $table->string('payment');
            $table->string('salary');
            $table->string('tax')->nullable();
            $table->string('leave_muchfall')->nullable()->comment('เงินที่ถูกหักจากลาเกิน');
            $table->string('work_latefall')->nullable()->comment('เงินที่ถูกหักจากเข้างานสาย');
            $table->string('not_workfall')->nullable()->comment('เงินที่ถูกหักจากขาดงาน');
            $table->string('leave_much')->nullable()->comment('จำนวนลาเกิน');
            $table->string('work_late')->nullable()->comment('จำนวนเข้างานสาย');
            $table->string('not_work')->nullable()->comment('จำนวนขาดงาน');
            $table->string('sumdown')->nullable();
            $table->string('amount')->nullable()->comment('จำนวนยอดเงินสุทธิ');
            $table->string('note')->nullable();
            $table->string('roundsalaries_id')->nullable();
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
        Schema::dropIfExists('salaries');
    }
};
