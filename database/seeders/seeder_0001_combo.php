<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class seeder_0001_combo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::debug('seerder_0001_combo @ delete');
        DB::table('combo_option')->delete();
        DB::table('combos')->delete();
        DB::table('options')->delete();

        Log::debug('seeder_0001_combo @ run');
        $this->call(seeder_0001_combo_yesno::class);

    }


}
