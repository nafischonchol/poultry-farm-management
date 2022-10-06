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
        Schema::create('sheets', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("sheet_no");
            $table->integer("current_sheet")->default(0)->comment("1 thakle oita current sheet");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string('status')->nullable();
            $table->text("_token")->nullable();
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
        Schema::dropIfExists('sheets');
    }
};
