<?php

use App\Models\Menu;
use App\Models\User;
use App\Models\Language;
use App\Models\ArticleType;
use App\Models\ArticleStatus;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ArticleType::class);
            $table->foreignIdFor(Language::class)->nullable();
            $table->foreignIdFor(Menu::class)->nullable();
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->string("cover_path")->nullable();
            $table->string("cover")->nullable();
            $table->text("lead",500)->nullable();
            $table->longText("body")->nullable();
            $table->datetime("event_start_date")->nullable();
            $table->datetime("event_end_date")->nullable();
            $table->string("event_location")->nullable();
            $table->datetime("delayed")->nullable();
            $table->string("form")->nullable();
            $table->foreignIdFor(ArticleStatus::class)->default(1);
            $table->foreignIdFor(User::class, 'created_by')->constrained('users')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
