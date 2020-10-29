<?php

use App\Models\Gsbuser;
use Illuminate\Database\Seeder;

class GsbuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gsbuser::class)->times(50)->create();
    }
}
