<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Menyimpan siapa yang mengambil uang
            $table->decimal('amount', 15, 2); // Jumlah yang diambil
            $table->date('withdrawal_date'); // Tanggal pengambilan
            $table->text('note')->nullable(); // Catatan pengambilan (opsional)
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
