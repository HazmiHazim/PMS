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
        Schema::table('ptk_activities', function (Blueprint $table) {
            $table->string('ORGANIZER')->nullable()->change();
            $table->string('APPLICATION_TYPE')->nullable()->change();
            $table->string('CLUB_NAME')->change();
            $table->string('ADVISOR_CLUB_NAME')->change();
            $table->string('ACTIVITY_NAME')->change();
            $table->string('ACTIVITY_TYPE')->change();
            $table->string('PARTICIPANT_NUM')->change();
            $table->string('VENUE')->change();
            $table->string('ACTIVITY_STARTDATE')->change();
            $table->string('ACTIVITY_ENDDATE')->change();
            $table->string('ACTIVITY_STARTTIME')->change();
            $table->string('ACTIVITY_ENDTIME')->change();
            $table->string('BUDGET')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
