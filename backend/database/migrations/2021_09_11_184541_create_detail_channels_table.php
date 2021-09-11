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
            $table->string('thumbnail');
            $table->string('published');
            $table->string('country');
            $table->string('customUrl');
            $table->string('defaultLanguage');
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
