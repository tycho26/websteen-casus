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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments("projectID");
            $table->boolean('projectPublic')->default(FALSE);
            $table->string('projectTitle',length:100);
            $table->string('projectImage')->nullable();
            $table->longText('projectDescription');
            $table->string('projectSlug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
