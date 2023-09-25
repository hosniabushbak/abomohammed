<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientHeadSectionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('client_head_section', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id', 'client_id_fk_7475666')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('head_section_id');
            $table->foreign('head_section_id', 'head_section_id_fk_7475666')->references('id')->on('head_sections')->onDelete('cascade');
        });
    }
}
