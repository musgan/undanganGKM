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
        Schema::create('session_activities', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("tagline");
            $table->string("location");
            $table->string("sub_location")->nullable();
            $table->integer("contribution_value")->nullable();
            $table->string("contribution_text")->nullable();
            $table->string("contribution_description")->nullable();
            $table->text("map_location")->nullable();
            $table->date("date_start")->nullable();
            $table->date("date_end")->nullable();
            $table->time("time_start")->nullable();
            $table->time("time_end")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_activities');
    }
};
