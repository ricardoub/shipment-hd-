<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class seeder_0001_combo_recordcategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder_0001_combo -> deve truncar os registros das tabelas combos, options e combo_option
        $this->seed_combo();
        $this->seed_options();
        $this->seed_combo_options();
    }
}
