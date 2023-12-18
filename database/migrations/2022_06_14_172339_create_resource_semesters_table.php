<?php

use App\Models\Resource;
use App\Models\Semester;
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
        Schema::create('resource_semester', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resource::class)->constrained();
            $table->foreignIdFor(Semester::class)->constrained();
            $table->timestamps();

            $table->unique(['resource_id', 'semester_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_semester');
    }
};
