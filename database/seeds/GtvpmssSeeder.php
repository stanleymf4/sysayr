<?php

use App\Models\Gtvpmss;
use Illuminate\Database\Seeder;

class GtvpmssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gtvpmss::class)->times(50)->create();
    }
}
