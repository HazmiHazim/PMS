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
        Schema::create('ptk_activities', function (Blueprint $table) {
            $table->id();
            $table->string('ACTIVITY_ID')->nullable();
            $table->string('PTK_ID')->nullable();
            $table->string('STD_ID')->nullable();
            $table->string('LEC_ID')->nullable();
            $table->string('D_ID')->nullable();
            $table->string('CDN_ID')->nullable();
            $table->string('HSD_ID')->nullable();
            $table->string('CLUB_NAME');
            $table->string('ADVISOR_CLUB_NAME');
            $table->string('ORGANIZER');
            $table->string('ACTIVITY_NAME');
            $table->string('APPLICATION_TYPE');
            $table->string('ACTIVITY_TYPE');
            $table->integer('PARTICIPANT_NUM');
            $table->string('VENUE');
            $table->date('ACTIVITY_STARTDATE');
            $table->date('ACTIVITY_ENDDATE');
            $table->time('ACTIVITY_STARTTIME');
            $table->time('ACTIVITY_ENDTIME');
            $table->integer('BUDGET');


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
        Schema::dropIfExists('ptk_activities');
    }
};
