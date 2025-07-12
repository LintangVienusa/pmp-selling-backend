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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('owner_name')->nullable();
            $table->string('top_type')->nullable();
            $table->unsignedBigInteger('transaction_limit')->nullable();
            $table->string('ktp_photo_url')->nullable();
            $table->string('npwp_photo_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn([
                'owner_name',
                'top_type',
                'transaction_limit',
                'ktp_photo_url',
                'npwp_photo_url',
            ]);
        });
    }
};
