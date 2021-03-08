<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteNightclubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nightclubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->string('address');
            $table->boolean('parking');
            $table->json('coordinates');
            $table->text('details');
            $table->string('cover');
            $table->timestamps();

            $table->index('name', 'nightclubs_idx_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nightclubs');
    }
}
