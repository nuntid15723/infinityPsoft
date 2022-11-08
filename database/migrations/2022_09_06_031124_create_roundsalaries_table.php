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
        Schema::create('roundsalaries', function (Blueprint $table) {
            $table->id();
            $table->string('rlname');
            $table->string('rlstatus');
            $table->date('roundstart');
            $table->date('roundend');
            $table->date('rounddate');
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
        Schema::dropIfExists('roundsalaries');
    }
};
