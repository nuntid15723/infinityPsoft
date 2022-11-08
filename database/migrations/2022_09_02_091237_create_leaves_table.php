<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('emid');
            $table->string('fullname');
            $table->string('pnid')->nullable();
            $table->string('ladepartment');
            $table->string('email');
            $table->string('typeleave');
            $table->string('laimg')->nullable();
            $table->string('timestart');
            $table->string('timeend')->nullable();
            $table->timestamp('daystartla')->nullable();
            $table->timestamp('dayendla')->nullable();
            $table->string('reasonla')->nullable();
            // $table->string('status')->nullable();
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
        Schema::dropIfExists('leaves');
    }
};
