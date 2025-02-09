<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\ArticleController;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\ArticleRevision;
use App\Models\ArticleType;
use Illuminate\Console\Command;

class ArticleDelay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'article:delay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set articles to active when delayed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $articles = Article::where("article_status_id", 7)->where("delayed", "<=", $now)->get();
        foreach ($articles as $article) {
            // article-nél státusz átírása aktívra, delayed mező = null
            $article->delayed = null;
            $article->article_status_id = 3; //aktív
            $article->save();
        }

        $articleRevisions = ArticleRevision::where("article_status_id", 7)->where("delayed", "<=", $now)->get();
        foreach ($articleRevisions as $articleRevision) {
            $article = Article::find($articleRevision->article_id)->first();
            $articleType = ArticleType::find($article->article_type_id);

            $articleController = new ArticleController();
            $articleController->approveRevision($articleRevision, $articleType->slug);
        }
    }
}
