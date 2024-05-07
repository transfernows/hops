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
            Schema::create('HopaCart', function (Blueprint $table) {
            $table->id()->unique();
            $table->decimal('Amount');
            $table->integer('CardCvv');
            $table->integer('CardExpireMonth');
            $table->integer('CardExpireYear');
            $table->integer('CardNumber');
            $table->text('CardOwnerTitle');
            $table->text('CustomerReferenceNumber');
            $table->text('ErrorCode');
            $table->text('Result');
            $table->text('Messege');
            $table->integer('status');
            $table->integer('black_list');
            $table->timestamps();
        });
        
        
        
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
