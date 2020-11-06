<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gsbuser')->insert([
            'gsbuser_login' => 'sysayr',
            'gsbuser_name' => 'super_admin',
            'password' => bcrypt('pas123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
