<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerIdToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Menambahkan kolom customer_id
            $table->unsignedBigInteger('customer_id')->after('id');

            // Membuat relasi ke tabel customers
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Menghapus kolom customer_id jika rollback
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
}
