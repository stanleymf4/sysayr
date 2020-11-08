<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->truncateTables([
            'gtvrole',
            'gtvpmss',
            'gtvdven',
            'gsbuser',
            'gsbusrl'
        ]);

        $this->call(GtvroleSeeder::class);
        $this->call(GtvpmssSeeder::class);
        $this->call(GtvdvenSeeder::class);
        $this->call(GsbuserSeeder::class);
        $this->call(UserAdministradorSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        foreach ($tables as $table) {
            /* DB::table($table)->truncate(); */
            DB::statement("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE");
        }
    }
}
