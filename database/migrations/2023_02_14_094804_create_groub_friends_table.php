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
        Schema::create('groub_friends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('groub_id');
            $table->unsignedBigInteger('friend_id');

            $table->foreign('groub_id')->references('id')->on('groubs')->onDelete('cascade');
            $table->foreign('friend_id')->references('id')->on('friends')->onDelete('cascade');
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
        Schema::dropIfExists('groub_friends');
    }
};
