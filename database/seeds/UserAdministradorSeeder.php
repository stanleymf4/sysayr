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
            'gsbuser_name' => 'superadmin',
            'gsbuser_email' => 'ss.melo@uniandes.edu.co',
            'password' => 'pas123',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /* DB::table('gsbuser')->insert([
            'gsbuser_login' => 'ss.melo',
            'gsbuser_name' => 'Stanley',
            'password' => bcrypt('pas123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); */

        DB::table('gsbusrl')->insert([
            'gsbusrl_role_id' => 1,
            'gsbusrl_user_id' => 1,
            'gsbusrl_status' => 1
        ]);

        /* DB::table('gsbusrl')->insert([
            'gsbusrl_role_id' => 2,
            'gsbusrl_user_id' => 2,
            'gsbusrl_status' => 1
        ]); */
    }
}
