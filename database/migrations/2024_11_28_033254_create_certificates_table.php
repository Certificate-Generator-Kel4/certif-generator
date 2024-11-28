<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('participant_id');
            $table->string('style');
            $table->string('signature');
            $table->timestamps();

            $table->foreign('event_id')->on('events')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('participant_id')->on('participants')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
