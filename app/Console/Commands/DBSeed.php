<?php

namespace App\Console\Commands;

use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use Illuminate\Support\Facades\File;

class DBSeed extends SeederMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make seeder overwrite';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        parent::handle();

        // TODO: error handling
        
        // write seedername in seeders.json
        $jsonFileName = $this->laravel->databasePath()."/seeders/seeders.json";
        
        $seeders = json_decode(File::get($jsonFileName));

        if ( !in_array($this->argument("name"), $seeders) ) {
            array_push($seeders, $this->argument("name"));
            File::put($jsonFileName, json_encode($seeders), false);
        }
    }
}
