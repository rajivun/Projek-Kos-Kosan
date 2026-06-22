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
        Schema::create('payments', function (Blueprint $table) {

    $table->id();

    $table->foreignId('user_id');

    $table->foreignId('rental_id');

    $table->integer('amount');

    $table->string('method')->nullable();

    $table->string('proof')->nullable();

    $table->enum('status', [
        'pending',
        'paid',
        'rejected'
    ])->default('pending');

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
        Schema::dropIfExists('payments');
    }
};
