<?php

use App\Models\Resource;
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
        Schema::create('rahimias', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(Resource::class)->constrained();
            $table->date('date')->format('YYYY/MM/DD')->nullable(false);
            $table->integer('received_amount')->nullable();
            $table->foreignId('received_by')->nullable();
            $table->string('receipt_no')->nullable();
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
        Schema::dropIfExists('rahimias');
    }
};
