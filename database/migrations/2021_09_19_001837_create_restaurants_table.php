<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name', 50);
            $table->text('description');
            $table->string('city', 30);
            $table->string('phone', 10);
            $table->foreignId('category_id');
            $table->enum('delivery', ['y', 'n']);
            $table->string('facebook', 256)->nullable();
            $table->string('twitter', 256)->nullable();
            $table->string('instagram', 256)->nullable();
            $table->string('youtube', 256)->nullable();

            /* Schedule */
            $table->string('schedule1')->nullable();
            $table->string('schedule2')->nullable();

            //Faltan

            $table->decimal('latitude', 7, 4)->nullable();
            $table->decimal('longitude', 7, 4)->nullable();

            $table->string('logo')->nullable();
            $table->string('nombreImagen')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
