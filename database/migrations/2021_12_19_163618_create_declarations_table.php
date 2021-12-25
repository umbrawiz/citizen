<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->string('identity_card');
            $table->string('name');
            $table->date('birthday');
            $table->integer('sex');
            $table->string('country');
            $table->string('permanent_address');
            $table->string('temporary_address');
            $table->integer('religion');
            $table->string('education');
            $table->string('job');
            $table->string('village_id');
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
        Schema::dropIfExists('declarations');
    }
}
