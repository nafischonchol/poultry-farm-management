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
        Schema::create('baccha_ojuns', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("sheet_no");
            $table->integer("qty")->default(0);
            $table->string("kg")->nullable();
            $table->integer("age")->default(0);
            $table->date("date")->nullable();
            $table->string("note")->nullable();
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
        Schema::dropIfExists('baccha_ojuns');
    }
};
