<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class seeder_0001_combo_recordtype extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::debug('seerder_0001_combo_yesno @ run');
        // seeder_0001_combo -> deve truncar os registros das tabelas combos, options e combo_option

        $this->seed_combo();
        $this->seed_options();
        $this->seed_combo_options();

    }

    public function seed_combo()
    {

        $key    = 0;
        $type   = 'recordtype';
        $action = 'combo';

        $items[$key]['type']        = $type;
        $items[$key]['action']      = $action;
        $items[$key]['name']        = 'Sim ou Não';
        $items[$key]['description'] = 'Caixa de Seleção com opções Sim ou Não';
        $items[$key]['order_by']    = 'value';

        foreach ($items as $key => $item) {
            Combo::updateOrCreate(
                [
                    'type'   => $type,
                    'action' => $action
                ],
                $items[$key]
            );
        }

    }
}
