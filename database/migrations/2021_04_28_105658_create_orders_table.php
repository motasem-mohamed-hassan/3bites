<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_email');
            $table->text('address');
            $table->string('lang');
            $table->string('lati');
            $table->enum('type', ['pickup', 'delivery '])->nullable();
            $table->boolean('confirm')->default(0);
            $table->decimal('products_price', 10, 2);
            $table->decimal('hst', 10, 2);
            $table->decimal('tip', 10, 2)->nullable();
            $table->decimal('delivery_cost', 10, 2)->nullable();
            $table->decimal('total', 10, 2);
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
}
