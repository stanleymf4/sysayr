<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GtvdvenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataVisibilityEntity = [
            'PROG',
            'DPTO',
            'COLL',
            'CAMP'
        ];

        foreach ($dataVisibilityEntity as $key => $value) {
            DB::table('gtvdven')->insert([
                'gtvdven_code' => $value,
                'gtvdven_user' => 'ssmelo',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
