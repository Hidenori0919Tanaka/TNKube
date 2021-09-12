<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_channels', function (Blueprint $table) {
            $table->string('channel_id');
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->string('published')->nullable();
            $table->string('country')->nullable();
            $table->string('customUrl')->nullable();
            $table->string('defaultLanguage')->nullable();
            $table->timestamps();
            $table->primary(['channel_Id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_channels');
    }
}
