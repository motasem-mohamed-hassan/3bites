<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOextrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oextras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oproduct_id')->constrained()->onDelete('cascade');
            $table->string('extra_name');
            $table->decimal('price', 10, 2);
            $table->string('type');
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
        Schema::dropIfExists('oextras');
    }
}
