<?php

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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('cnic')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('present_address')->nullable();
            $table->string('education')->nullable();
            $table->integer('maliyat')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('region_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('shehar_id')->nullable()->constrained('shehars')->nullOnDelete();
            $table->foreignId('halqa_id')->nullable()->constrained('halqas')->nullOnDelete();
            $table->foreignId('unit_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tarbiati_status_id')->nullable()->constrained('statuses')->nullOnDelete();
            $table->foreignId('intizami_status_id')->nullable()->constrained('statuses')->nullOnDelete();
            $table->foreignId('dawati_status_id')->nullable()->constrained('statuses')->nullOnDelete();

            $table->timestamps();
        });
    }

    protected $hidden = 'id';

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
};
