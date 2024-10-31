<?php

use App\Models\Article;
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
        Schema::create('article_revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Article::class);
            $table->foreignIdFor(Language::class)->nullable();
            $table->foreignIdFor(Menu::class);
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->string("cover_path")->nullable();
            $table->string("cover")->nullable();
            $table->text("lead",500)->nullable();
            $table->text("body")->nullable();
            $table->foreignIdFor(ArticleStatus::class);
            $table->foreignIdFor(User::class, 'created_by')->constrained('users')->onDelete('cascade');
            $table->text("log");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_revisions');
    }
};
