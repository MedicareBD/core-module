<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->after('email')->default('avatar.png');
            $table->string('mobile')->after('avatar')->nullable();
            $table->string('phone')->after('mobile')->nullable();
            $table->string('secondary_email')->after('phone')->nullable();
            $table->string('contact')->after('secondary_email')->nullable();
            $table->string('address')->after('contact')->nullable();
            $table->string('address_2')->after('address')->nullable();
            $table->string('fax')->after('address_2')->nullable();
            $table->string('city')->after('fax')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->string('zip')->after('state')->nullable();
            $table->string('country')->after('zip')->nullable();
            $table->string('wallet')->after('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
};
