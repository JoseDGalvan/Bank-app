<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type', 40);
            $table->string('amount', 40);
            $table->unsignedBigInteger('account_id_origin')->nullable();
            $table->foreign('account_id_origin')->references('id')->on('accounts');
            $table->unsignedBigInteger('account_id_destination');
            $table->foreign('account_id_destination')->references('id')->on('accounts');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
