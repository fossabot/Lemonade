<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('first_name');
            $table->string('last_name');

            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('registration_date');
            $table->ipAddress('registration_ip');
            $table->string('password');

            $table->string('fiscal_code')->nullable()->unique();
            $table->string('birth_place_id')->nullable();
            $table->date('birthdate')->nullable();
            $table->boolean('gender')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('birth_place_id')
                ->references('belfiore_code')->on('towns')
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
        Schema::dropIfExists('users');
    }
}
