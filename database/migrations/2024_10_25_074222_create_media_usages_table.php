<?php

use App\Models\Media;
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
        Schema::create('media_usages', function (Blueprint $table) {
            $table->id();
            $table->string("media_type");
            $table->foreignIdFor(Media::class);
            $table->string("content_type");
            $table->integer("content_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_usages');
    }
};
