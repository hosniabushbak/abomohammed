<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('head_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('welcome_text_ar');
            $table->string('welcome_text_en');
            $table->string('head_text_ar');
            $table->string('head_text_en');
            $table->string('sup_head_ar');
            $table->string('sup_head_en');
            $table->string('sent_text_ar');
            $table->string('sent_text_en');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('place_ar');
            $table->string('place_en');
            $table->string('name_ar');
            $table->string('name_text_ar');
            $table->string('name_en');
            $table->string('name_text_en');
            $table->string('email_ar');
            $table->string('email_text_ar');
            $table->string('email_en');
            $table->string('email_text_en');
            $table->string('mobile_ar');
            $table->string('mobile_text_ar');
            $table->string('mobile_en');
            $table->string('mobile_text_en');
            $table->string('note_ar');
            $table->string('note_en');
            $table->string('button_ar');
            $table->string('button_en');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
