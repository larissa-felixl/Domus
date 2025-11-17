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
        Schema::create('contract_costumer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained()->onDelete('cascade');
            $table->foreignId('costumer_id')->constrained()->onDelete('cascade');
            $table->string('role')->nullable(); // Papel do cliente no contrato (ex: Locatário, Fiador, Comprador)
            $table->timestamps();
            
            // Evita duplicatas (mesmo cliente não pode estar 2x no mesmo contrato com mesmo papel)
            $table->unique(['contract_id', 'costumer_id', 'role']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_costumer');
    }
};
