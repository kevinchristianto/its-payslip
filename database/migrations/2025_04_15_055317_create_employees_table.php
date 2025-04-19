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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('name');
            $table->enum('gender', ['M', 'F']);
            $table->enum('status', ['PKWT', 'PKWTT', 'Outsource']);
            $table->string('email')->unique();
            $table->string('bank_name');
            $table->string('bank_account_name');
            $table->string('bank_account_number')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
