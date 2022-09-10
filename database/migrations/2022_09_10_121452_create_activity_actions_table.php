<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('activity_actions', function (Blueprint $table) {
            $table->id();
            $table->integer('activity_id')->unsigned();
            $table->text('action_taken');
            $table->text('challenge');
            $table->integer('actor')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('actions');
    }
};
