<?php

namespace Database\Seeders;

use App\Models\Combo;
use App\Models\Option;
use App\Models\ComboOption;
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

        $key    = 0;
        $type   = 'yesno';
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

    public function seed_options()
    {
        $key  = 0;
        $type = 'yesno';

        $items[$key]['type']  = $type;
        $items[$key]['value'] = 0;
        $items[$key]['text']  = 'Selecione ...';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['value'] = 1;
        $items[$key]['text']  = 'Sim';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['value'] = 2;
        $items[$key]['text']  = 'Não';

        foreach ($items as $key => $item) {
            Option::updateOrCreate(
                [
                    'type'  => $type,
                    'value' => $item['value']
                ],
                $items[$key]
            );
        }

    }

    public function seed_combo_options()
    {
        Log::debug('seerder_0001_combo_yesno @ seed_combo_options');

        $key    = 0;
        $type   = 'yesno';
        $action = 'combo';

        $combo   = $this->cbService->seeder_getCombo_ofType($type, $action);
        $options = $this->cbService->seeder_getOptions_ofType($type);
        Log::debug('combo');
        Log::debug($combo);

        Log::debug('options');
        Log::debug($options);

        foreach ($options as $key => $option) {

            $items[$key]['combo_id']  = $combo->id;
            $items[$key]['option_id'] = $option->id;
            $items[$key]['active']  = true;
            $items[$key]['enabled'] = true;
            $items[$key]['showed']  = true;
            $items[$key]['order']   = 0;

        }

        foreach ($items as $key => $item) {
            ComboOption::updateOrCreate(
                [
                    'combo_id'  => $item['combo_id'],
                    'option_id' => $item['option_id']
                ],
                $items[$key]
            );
        }

        // $combo = $this->cbService->seeder_getCombo_ofType($type, $action);
        // Log::debug($combo->options);

    }

}
