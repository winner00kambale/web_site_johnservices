<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('other_services', function (Blueprint $table) {
            $table->id();
            $table->text('title_en');
            $table->text('title_fr');
            $table->text('description_fr');
            $table->text('description_en');
            $table->text('flaticon ')->nullable();
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_services');
    }
};
