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
        Schema::table('friends', function (Blueprint $table) {
            $table->unsignedBigInteger('groub_id')->nullable();
            $table->foreign('groub_id')
              ->references('id')->on('groubs')->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('friends', function (Blueprint $table) {
            //
        });
    }
};