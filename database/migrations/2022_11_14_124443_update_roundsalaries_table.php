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
        Schema::table('roundsalaries', function (Blueprint $table) {
            $table->string('totle_salary')->nullable()->after('rounddate');
            // ->comment('0 = พร้อมเสริฟ | 1 = ของหมด');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roundsalaries', function (Blueprint $table) {
            $table->dropColumn('totle_salary');
        });
    }
};
