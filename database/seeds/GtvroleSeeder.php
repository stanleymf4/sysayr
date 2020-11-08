<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GtvroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            'superadmin',
            'Administrador',
            'Editor',
            'Supervisor',
            'Consulta'
        ];

        foreach ($role as $key => $value) {
            DB::table('gtvrole')->insert([
                'gtvrole_desc' => $value,
                'gtvrole_user' => 'ssmelo',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
