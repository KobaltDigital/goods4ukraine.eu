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

            $table->string('telephone')->nullable();
            $table->boolean('show_telephone')->default(false);

            $table->string('email')->nullable();
            $table->boolean('show_email')->default(false);

            // Address (Eventueel los trekken)
            $table->string('venue')->nullable();
            $table->string('street');
            $table->string('postcode');
            $table->integer('house_number');
            $table->integer('house_number_suffix')->nullable(); // Of aan elkaar (?)
            $table->string('city');
            $table->string('country');
            $table->point('location');
            
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
