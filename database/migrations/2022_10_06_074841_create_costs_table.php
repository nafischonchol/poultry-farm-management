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
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("shop_id")->nullable();
            $table->integer("sheet_no")->nullable();
            $table->string("shop_address")->nullable();
            $table->date("date");
            $table->string('category');
            $table->string('name')->nullable();
            $table->string('note')->nullable();
            $table->string('price');
            $table->integer('qty');
            $table->integer('bonus_qty')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costs');
    }
};
