<?php

use App\Models\Court; // class models
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('court_type_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });

        // insert data ke database
        Court::insert([
            ['court_type_id' => 1, 'name' => 'indoor', 'price' => 300000],
            ['court_type_id' => 2, 'name' => 'indoor', 'price' => 250000],
            ['court_type_id' => 3, 'name' => 'indoor', 'price' => 200000],
            ['court_type_id' => 1, 'name' => 'outdoor', 'price' => 250000],
            ['court_type_id' => 2, 'name' => 'outdoor', 'price' => 200000],
            ['court_type_id' => 3, 'name' => 'outdoor', 'price' => 150000],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
