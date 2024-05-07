<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {


        Schema::create('api_operations', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('group_id');
            $table->integer('session_id');
            $table->string('token', 64)->unique();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
    }
};
