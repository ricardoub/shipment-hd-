<?php

namespace Database\Seeders;

use App\Services\ComboService;
use Illuminate\Database\Seeder;
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
        Log::debug('seeder_0001_combo_yesno @ run');
        // seeder_0001_combo -> deve truncar os registros das tabelas combos, options e combo_option

        $type   = 'yesno';
        $action = 'combo';

        $this->seed_combo($type, $action);
        $this->seed_options($type);
        $this->seed_combo_options($type, $action);

    }

    public function seed_combo($type, $action)
    {
        Log::debug('seeder_0001_combo_yesno @ seed_combo');

        $key    = 0;

        $items[$key]['type']        = $type;
        $items[$key]['action']      = $action;
        $items[$key]['name']        = 'Sim ou Não';
        $items[$key]['description'] = 'Caixa de Seleção com as opções Sim ou Não';
        $items[$key]['order_by']    = 'value';

        foreach ($items as $key => $item) {
            $model = $this->cbService->setCombo_updateOrCreate($type, $action, $items[$key]);
        }

    }

    public function seed_options($type)
    {
        Log::debug('seeder_0001_combo_yesno @ seed_options');

        $key  = 0;

        $items[$key]['type']  = $type;
        $items[$key]['code']  = 0;
        $items[$key]['value'] = 'not_found';
        $items[$key]['text']  = 'Not found';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 100;
        $items[$key]['value'] = 'select';
        $items[$key]['text']  = 'Seleccione ...';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 101;
        $items[$key]['value'] = 'yes';
        $items[$key]['text']  = 'Sim';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 102;
        $items[$key]['value'] = 'no';
        $items[$key]['text']  = 'Não';

        foreach ($items as $key => $item) {
            $code = $items[$key]['code'];
            $model = $this->cbService->setOption_updateOrCreate($type, $code, $items[$key]);
        }

    }

    public function seed_combo_options($type, $action)
    {
        Log::debug('seeder_0001_combo_yesno @ seed_combo_options');

        $key    = 0;

        $combo   = $this->cbService->getCombo_ofType($type, $action);
        $options = $this->cbService->getOptions_ofType($type);

        foreach ($options as $key => $option) {

            $items[$key]['combo_id']       = $combo->id;
            $items[$key]['option_id']      = $option->id;
            $items[$key]['active']         = true;
            $items[$key]['enabled']        = true;
            $items[$key]['showed']         = true;
            $items[$key]['order']          = 0;
            $items[$key]['css_icon']       = null;
            $items[$key]['css_text_color'] = null;
            $items[$key]['css_bg_color']   = null;

        }

        foreach ($items as $key => $item) {

            $combo_id  = $item['combo_id'];
            $option_id = $item['option_id'];

            $model = $this->cbService->setComboOption_updateOrCreate($combo_id, $option_id, $items[$key]);

        }

        $combo = $this->cbService->getCombo_ofType($type, $action);
        Log::debug($combo->options);

    }

}
