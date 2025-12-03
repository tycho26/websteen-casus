<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->increments("plotID");
            $table->foreignIdFor(Project::class);
            $table->string("plotTitle");
            $table->string("plotMunicipality");
            $table->string("plotSection");
            $table->integer("plotNum");
            $table->integer("plotArea")->default(0);
            $table->enum('areaTaskStatus',["not_requested","pending","in_progress","completed","failed"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
