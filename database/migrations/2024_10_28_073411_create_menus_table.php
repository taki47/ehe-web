<?php

use App\Models\Language;
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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->nullable();
            $table->string("link")->nullable();
            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->string("subdescription")->nullable();
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->integer("order")->default(0);
            $table->foreignIdFor(Language::class)->nullable();
            $table->char("status", 1)->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
