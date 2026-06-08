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
    Schema::create('rentals', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('kamar_id')
              ->constrained('kamars')
              ->onDelete('cascade');

        $table->date('start_date');

        $table->date('end_date');

        $table->integer('duration_month');

        $table->decimal('total_price', 12, 2);

        $table->enum('status', [
            'PENDING',
            'ACTIVE',
            'EXPIRED',
            'CANCELLED'
        ])->default('PENDING');

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
        Schema::dropIfExists('rentals');
    }
};
