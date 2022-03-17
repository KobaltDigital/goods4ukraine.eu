<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');

            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('type'); // offered, wanted


            // Address (Eventueel los trekken)
            $table->string('venue')->nullable();
            $table->string('street');
            $table->string('postcode');
            $table->string('city');
            $table->string('country');
            $table->point('location')->nullable();

            // Image gaat via media library (?)

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
