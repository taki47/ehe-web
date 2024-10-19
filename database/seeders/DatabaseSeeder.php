<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    private $commands = [
        'mysql' => [
            'enable' => 'SET FOREIGN_KEY_CHECKS=1;',
            'disable' => 'SET FOREIGN_KEY_CHECKS=0;',
        ],
        'sqlite' => [
            'enable' => 'PRAGMA foreign_keys = ON;',
            'disable' => 'PRAGMA foreign_keys = OFF;',
        ]
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        $this->truncateTables([
            'users',
            'permissions',
            'roles',
            'settings'
        ]);

        $seeders = json_decode(File::get("database/seeders/seeders.json"));
        $runned_seeders = \App\Models\Seeder::pluck("name")->toArray();
        
        foreach ($seeders as $seeder) {
            if ( !in_array($seeder,$runned_seeders) ) {
                
                $className = "Database\\Seeders\\".$seeder;
                $model     = new $className;
                $this->call($model::class);

                \App\Models\Seeder::create([
                    "name" => $seeder
                ]);
    }
        }

        $this->enableForeignKeys();
    }

    /**
     * Truncate or delete the data from the tables based on DB driver
     * 
     * @param array $tables
     */
    protected function truncateTables(array $tables)
    {
        foreach ($tables as $table) {
            if (DB::getDriverName() === 'sqlite') {
                // SQLite-ban az adatokat töröljük a táblákból
                // DB::table($table)->delete();
            } else {
                // MySQL/MariaDB esetén truncate parancsot használunk
                DB::table($table)->truncate();
            }
        }
    }

    /**
     * Disable foreign key checks for current db driver
     */
    protected function disableForeignKeys()
    {
        DB::statement($this->getDisableStatement());
    }

    /**
     * Enable foreign key checks for current db driver
     */
    protected function enableForeignKeys()
    {
        DB::statement($this->getEnableStatement());
    }

    /**
     * Return current driver enable command
     * @return mixed
     */
    private function getEnableStatement()
    {
        return $this->getDriverCommands()['enable'];
    }

    /**
     * Return current driver disable command
     * @return mixed
     */
    private function getDisableStatement()
    {
        return $this->getDriverCommands()['disable'];
    }

    /**
     * Returns command array for current db driver
     * @return mixed
     */
    private function getDriverCommands()
    {
        return $this->commands[DB::getDriverName()];
    }
}
