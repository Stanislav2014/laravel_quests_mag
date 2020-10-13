<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quest_id')->unsigned();
            $table->foreign('quest_id')
                ->references('id')
                ->on('quests')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dateTime('event_date');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
