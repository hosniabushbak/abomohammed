<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->longText('site_footer');
            $table->string('email');
            $table->string('mobile');
            $table->string('whatsapp');
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('key_words_ar')->nullable();
            $table->longText('key_words_en')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
