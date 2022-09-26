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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->float('total');
            $table->foreignId('customer_id')->constrained()->nullable();
            $table->string('payment_method')->nullable();
            $table->string('category');
            $table->string('sale_type');
            $table->foreignId('work_id')->constrained();
            $table->timestamps();
        });
    }
    // $table->id();
    // $table->foreignId('product_id')->constrained();
    // $table->float('price');
    // $table->integer('quantity');
    // $table->string('payment_method')->nullable();
    // $table->string('sale_type');
    // $table->foreignId('work_id')->constrained();
    // $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
