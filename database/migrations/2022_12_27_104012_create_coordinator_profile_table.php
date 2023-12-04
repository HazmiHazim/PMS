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
        Schema::create('coordinator_profile', function (Blueprint $table) {
            $table->id();
            $table->String('CDN_ID')->unique();
            $table->String('CDN_Name');
            $table->String('CDN_Email');
            $table->String('CDN_Phone');
            $table->String('CDN_Gender');
            $table->String('CDN_Address');
            $table->String('CDN_Pass');
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
        Schema::dropIfExists('coordinator_profile');
    }
};
