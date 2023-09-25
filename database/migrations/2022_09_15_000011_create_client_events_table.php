<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEventsTable extends Migration
{
    public function up()
    {
        Schema::create('client_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->longText('text')->nullable();
            $table->string('responsive');
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
