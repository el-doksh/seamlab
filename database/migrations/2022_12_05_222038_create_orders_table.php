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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['dine-in', 'delivery', 'takeaway']);
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->unsignedInteger('table_number')->nullable();
            $table->string('waiter_name')->nullable();
            $table->unsignedDouble('fees', 15,2)->default(0);
            $table->unsignedDouble('total', 20,2)->default(0);
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
        Schema::dropIfExists('orders');
    }
};
