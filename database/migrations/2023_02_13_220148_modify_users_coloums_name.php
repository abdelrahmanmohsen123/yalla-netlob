<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('User', function (Blueprint $table) {
            //

            DB::statement('ALTER TABLE `users` MODIFY `password` TEXT NULL;');
            DB::statement('ALTER TABLE `users` MODIFY `token` TEXT NULL;');
            DB::statement('ALTER TABLE `users` RENAME COLUMN `remember_token` TO `token`;');
            DB::statement('ALTER TABLE `users` RENAME COLUMN `google_id` TO `logged_with_id`;');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('User', function (Blueprint $table) {
            //
        });
    }
};
