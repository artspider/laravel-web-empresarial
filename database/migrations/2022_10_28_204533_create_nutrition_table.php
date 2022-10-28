<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('nutrition', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained();
            $table->unsignedMediumInteger('calories')->nullable();
            $table->unsignedMediumInteger('carbohydrate')->nullable();
            $table->unsignedMediumInteger('cholesterol')->nullable();
            $table->unsignedMediumInteger('fat')->nullable();
            $table->unsignedMediumInteger('transfat')->nullable();
            $table->unsignedMediumInteger('saturatedfat')->nullable();
            $table->unsignedMediumInteger('unsaturatedfat')->nullable();
            $table->unsignedMediumInteger('fiber')->nullable();
            $table->unsignedMediumInteger('sodium')->nullable();
            $table->unsignedMediumInteger('sugar')->nullable();
            $table->unsignedMediumInteger('servingsize')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrition');
    }
}
