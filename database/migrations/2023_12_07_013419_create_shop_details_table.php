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
        Schema::create('shop_details', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('shop_id')->constrained();
            $table->string('phone_number')->nullable()->unique();
            $table->string('address', 100)->nullable();
            $table->timestamps();

            //主キーをshop_idに設定
            $table->primary('shop_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_details');
    }
};
