<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('thumbnail')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->decimal('ticket_price', 10, 2)->default(0);
            $table->json('open_hours')->nullable();
            $table->json('facilities')->nullable();
            $table->text('route')->nullable();
            $table->enum('status', ['draft','published'])->default('published');
            $table->timestamps();
        });

        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('owner');
            $table->string('category');
            $table->longText('description');
            $table->string('thumbnail')->nullable();
            $table->string('address')->nullable();
            $table->string('whatsapp')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->enum('status', ['draft','published'])->default('published');
            $table->timestamps();
        });

        Schema::create('umkm_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('umkm_id')->constrained('umkm')->cascadeOnDelete();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('division')->nullable();
            $table->string('photo')->nullable();
            $table->date('period_start')->nullable();
            $table->date('period_end')->nullable();
            $table->text('bio')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->enum('type', ['pendapatan','belanja','pembiayaan']);
            $table->string('category');
            $table->text('description');
            $table->decimal('planned', 18, 2)->default(0);
            $table->decimal('realized', 18, 2)->default(0);
            $table->enum('quarter', ['Q1','Q2','Q3','Q4','TAHUNAN'])->default('TAHUNAN');
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm_products');
        Schema::dropIfExists('umkm');
        Schema::dropIfExists('wisata');
        Schema::dropIfExists('officials');
        Schema::dropIfExists('apbdes');
    }
};
