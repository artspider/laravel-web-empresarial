<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100);
            $table->string('contact_name', 100);
            $table->string('contact_title', 100);
            $table->string('address');
            $table->string('suburb', 100);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->integer('zip');
            $table->string('phone', 20);
            $table->string('website');
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
        Schema::dropIfExists('suppliers');
    }
}
