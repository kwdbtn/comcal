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
            $table->date('due_date');
            $table->string('priority');
            $table->integer('delegate')->unsigned()->nullable();
            $table->integer('user_group_id')->unsigned();
            $table->string('status')->default("Not Started");
            $table->text('remarks')->nullable();
            $table->integer('created_by')->unsigned();
            $table->boolean('due')->default(false);
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
