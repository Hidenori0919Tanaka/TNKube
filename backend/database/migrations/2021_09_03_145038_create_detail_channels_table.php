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
            // $table->id();
            $table->string('channel_Id');
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail');
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
