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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->dateTime('due_date');
            $table->integer('responsibility')->unsigned();
            $table->integer('recipient')->unsigned();
            $table->boolean('completed')->default(false);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('activities');
    }
};
