<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 255);
            $table->string('gender', 20);
            $table->string('email', 255);
            $table->char('postcode', 8);
            $table->string('address', 255);
            $table->string('building_name')->nullable();
            $table->string('opinion', 255);
            $table->date('created_at')->useCurrent()->nullable();
            $table->date('updated_at')->useCurrent()->nullable();
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
