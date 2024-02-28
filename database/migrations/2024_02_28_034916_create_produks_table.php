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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('kode', 20)->nullable();
            $table->string('barcode')->index()->unique()->nullable();
            $table->string('nama_produk', 100)->nullable();
            $table->unsignedInteger('kategori_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->string('satuan')->nullable();
            $table->unsignedInteger('pengali')->default(0);
            $table->decimal('harga_beli', 8 ,2)->default(0);
            $table->decimal('harga_jual_1', 8 ,2)->default(0);
            $table->decimal('harga_jual_2', 8 ,2)->default(0);
            $table->decimal('harga_jual_3', 8 ,2)->default(0);
            $table->unsignedInteger('qtymin_1')->default(0);
            $table->unsignedInteger('qtymin_2')->default(0);
            $table->unsignedInteger('qtymin_3')->default(0);
            $table->unsignedInteger('qtymin')->default(0);
            $table->unsignedInteger('qtymak')->default(0);
            $table->text('path_image')->nullable();
            $table->boolean('isaktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
