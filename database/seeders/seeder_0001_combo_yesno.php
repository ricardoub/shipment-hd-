<?php

namespace Database\Seeders;

use App\Models\Combo;
use App\Models\Option;
use App\Services\ComboService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class seeder_0001_combo_yesno extends Seeder
{
    private $cbService;

    public function __construct(
        ComboService $cbService
    ){
        $this->cbService = $cbService;
    }

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

    public function seed_combo()
    {

        $yesno = [
            [
                'type'        => 'yesno',
                'action'      => 'combo',
                'name'        => 'Sim ou Não',
                'description' => 'Caixa de seleção com opções Sim ou Não',
                'order_by'    => 'value',
            ]

        ];

        DB::table('combos')->insert($yesno);
    }

    public function seed_options()
    {

        $yesno = [
            [
                'type'  => 'yesno',
                'value' => 0,
                'text'  => 'Selecione...'
            ],
            [
                'type'  => 'yesno',
                'value' => 1,
                'text'  => 'Sim'
            ],
            [
                'type'  => 'yesno',
                'value' => 2,
                'text'  => 'Nao'
            ],
        ];

        DB::table('options')->insert($yesno);

    }

    public function seed_combo_options()
    {
        Log::debug('seerder_0001_combo_yesno @ seed_combo_options');

        $combo = $this->cbService->seeder_getCombo_ofType('yesno', 'combo');

        $options = $this->cbService->seeder_getOptions_ofType('yesno');

        $yesno = [
            [
                'combo_id'  => $combo['id'],
                'option_id' => $options[0]['id'],
                'active'    => true,
                'enabled'   => true,
                'showed'    => true,
                'order'     => 0,
            ],
            [
                'combo_id'  => $combo['id'],
                'option_id' => $options[1]['id'],
                'active'    => true,
                'enabled'   => true,
                'showed'    => true,
                'order'     => 0,
            ],
            [
                'combo_id'  => $combo['id'],
                'option_id' => $options[1]['id'],
                'active'    => true,
                'enabled'   => true,
                'showed'    => true,
                'order'     => 0,
            ],
        ];

        DB::table('combo_option')->insert($yesno);

        $combo = $this->cbService->seeder_getCombo_ofType('yesno', 'combo');

        Log::debug($combo->options);

    }

}
