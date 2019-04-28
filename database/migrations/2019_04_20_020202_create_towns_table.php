<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->string('belfiore_code')->primary();

            $table->string('nome')->unique();
            $table->boolean('is_abroad')->default(false);

            $table->unsignedBigInteger('province')->nullable();
        });

        Schema::table('towns', function (Blueprint $table) {
            $table->foreign('province')
                ->references('id')->on('provinces')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('town');
    }
}
