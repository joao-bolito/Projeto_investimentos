<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ativos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_de_ativo');
            $table->string('ativo');
            $table->date('data_de_compra');
            $table->integer('quantidade');
            $table->decimal('preco', 15, 2);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ativos');
    }
};
