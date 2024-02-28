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
        Schema::create('opnames', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('produk_id')->nullable();
            $table->unsignedInteger('qty')->default(0);
            $table->string('satuan')->nullable();
            $table->decimal('harga_beli', 8 ,2)->default(0);
            $table->decimal('sub_total', 8 ,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opnames');
    }
};
