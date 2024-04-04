<?php

use App\Models\Car;
use App\Models\TypeEngine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Car::class)->nullable();
            $table->decimal('volume', 2, 1);
            $table->foreignIdFor(TypeEngine::class);
            $table->integer('hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engines');
    }
};
