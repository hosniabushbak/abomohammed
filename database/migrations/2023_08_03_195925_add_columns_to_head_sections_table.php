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
        Schema::table('head_sections', function (Blueprint $table) {
            $table->string('event_days');
            $table->string('event_from_day');
            $table->string('event_to_day');
            $table->text('zoom_details');
            $table->text('zoom_url');
            $table->text('zoom_schedual_url');
            $table->string('meeting_id');
            $table->string('passcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('head_sections', function (Blueprint $table) {
            //
        });
    }
};
