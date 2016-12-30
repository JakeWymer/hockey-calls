<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePlayerSubmissionToInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submissions', function (Blueprint $table) {
            DB::statement('ALTER TABLE submissions MODIFY pick_one  INTEGER;');
            DB::statement('ALTER TABLE submissions MODIFY pick_two  INTEGER;');
            DB::statement('ALTER TABLE submissions MODIFY pick_three  INTEGER;');
            DB::statement('ALTER TABLE submissions MODIFY pick_wildcard  INTEGER;');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submissions', function (Blueprint $table) {
            //
        });
    }
}
