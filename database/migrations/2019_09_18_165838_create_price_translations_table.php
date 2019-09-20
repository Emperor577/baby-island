<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_translations', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('price_id')->unsigned();
            $table->string('title');
            $table->string('price_count');
            $table->text('price_name');
            $table->string('locale')->index();
            $table->unique(['price_id','locale']);
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_translations');
    }
}
