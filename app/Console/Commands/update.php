<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update after install';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call("migrate");
        Artisan::call("db:seed");
        Artisan::call("optimize:clear");
    }
}