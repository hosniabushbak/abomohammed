<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->unique();
            $table->string('title_ar');
            $table->string('title_en');
            $table->longText('short_info_ar');
            $table->longText('short_info_en');
            $table->longText('text_ar');
            $table->string('text_en');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
