<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->unsignedMediumInteger('command')->nullable();
            $table->unsignedSmallInteger('qty');
            $table->decimal('price', 7, 2);
            $table->decimal('total', 7, 2);
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
        Schema::dropIfExists('dish_orders');
    }
}
