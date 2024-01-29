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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('lang_id');
            $table->integer('provider_id');
            $table->integer('service_cat');
            $table->string('code');
            $table->string('title');
            $table->string('phone');
            $table->text('address');
            $table->boolean('status')->default(1);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
