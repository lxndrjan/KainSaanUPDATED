<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_establishments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('store_name');
            $table->json('coords');
            $table->longText('address');
            $table->double('rating')->default(0);
            $table->string('category');
            $table->string('cuisine_type');
            $table->integer('views')->default(0);
            $table->string('parking_info')->nullable();
            $table->string('average_cost');
            $table->longText('store_description');
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
        Schema::dropIfExists('food_establishments');
    }
};
