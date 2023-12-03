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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->enum('type', ['umum', 'undangan'])->default("undangan");
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->integer('total_member')->nullable();
            $table->boolean('will_attend')->nullable();
            $table->integer('total_paid')->nullable();
            $table->boolean('paid_off')->nullable();
            $table->timestamps();
            $table->foreignId('session_activity_id')->constrained('session_activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
};
