<?php

use App\Models\Center;
use App\Models\Region;
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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(Center::class)->constrained();
            $table->integer('semester_number')->nullable();
            $table->integer('semester_shuraka')->nullable();
            $table->foreignId('muhazir_id')->nullable()->constrained('resources')->nullOnDelete();
            $table->foreignId('mawin_muhazir_id')->nullable()->constrained('resources')->nullOnDelete();
            $table->date('start_date')->format('YYYY/MM/DD')->nullable(false);
            $table->date('end_date')->format('YYYY/MM/DD')->nullable(false);
            $table->foreignId('region_id')->nullable()->constrained('regions')->nullOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained('zones')->nullOnDelete();
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
        Schema::dropIfExists('semesters');
    }
};
