<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualanitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_id')->constrained('penjualans')->onDelete('cascade');
            $table->unsignedInteger('produk_id')->nullable();
            $table->unsignedInteger('qty')->default(0);
            $table->string('satuan')->nullable();
            $table->decimal('harga_jual', 8 ,2)->default(0);
            $table->double('diskon', 8 ,0)->default(0);
            $table->decimal('sub_total', 8 ,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualanitems');
    }
};
