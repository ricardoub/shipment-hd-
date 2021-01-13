<?php

namespace Database\Seeders;

use App\Services\ComboService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class seeder_0001_combo_recordtype extends Seeder
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
        Log::debug('seeder_0001_combo_recordtype @ run');
        // seeder_0001_combo -> deve truncar os registros das tabelas combos, options e combo_option

        $type   = 'recordtype';
        $action = 'combo';

        $this->seed_combo($type, $action);
        $this->seed_options($type);
        $this->seed_combo_options($type, $action);

    }

    public function seed_combo($type, $action)
    {
        Log::debug('seeder_0001_combo_recordtype @ seed_combo');

        $key    = 0;

        $items[$key]['type']        = $type;
        $items[$key]['action']      = $action;
        $items[$key]['name']        = 'Tipos de registro';
        $items[$key]['description'] = 'Caixa de Seleção com opções como: Data, Valor, Quantidede, evento, etc';
        $items[$key]['order_by']    = 'text';

        foreach ($items as $key => $item) {
            $model = $this->cbService->setCombo_updateOrCreate($type, $action, $items[$key]);
        }

    }

    public function seed_options($type)
    {
        Log::debug('seeder_0001_combo_recordtype @ seed_options');

        $key  = 0;

        $items[$key]['type']  = $type;
        $items[$key]['code']  = 0;
        $items[$key]['value'] = 'not_found';
        $items[$key]['text']  = 'Not found';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 100;
        $items[$key]['value'] = 'select';
        $items[$key]['text']  = 'Select ...';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 101;
        $items[$key]['value'] = 'data';
        $items[$key]['text']  = 'Data';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 102;
        $items[$key]['value'] = 'data_intervalo';
        $items[$key]['text']  = 'Intervalo de datas';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 103;
        $items[$key]['value'] = 'data_prazo';
        $items[$key]['text']  = 'Prazo em data';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 111;
        $items[$key]['value'] = 'hora';
        $items[$key]['text']  = 'Hora';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 112;
        $items[$key]['value'] = 'hora_intervalo';
        $items[$key]['text']  = 'Intervalo de horas';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 113;
        $items[$key]['value'] = 'hora_prazo';
        $items[$key]['text']  = 'Prazo em horas';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 121;
        $items[$key]['value'] = 'evento';
        $items[$key]['text']  = 'Evento';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 122;
        $items[$key]['value'] = 'evento_periodico';
        $items[$key]['text']  = 'Evento periódico';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 131;
        $items[$key]['value'] = 'numero';
        $items[$key]['text']  = 'Valor numérico';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 132;
        $items[$key]['value'] = 'numero_qtde';
        $items[$key]['text']  = 'Quantidade de valor';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 133;
        $items[$key]['value'] = 'numero_prazo';
        $items[$key]['text']  = 'Prazo em números';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 141;
        $items[$key]['value'] = 'moeda';
        $items[$key]['text']  = 'Valor monetário';

        $key++;
        $items[$key]['type']  = $type;
        $items[$key]['code']  = 151;
        $items[$key]['value'] = 'texto';
        $items[$key]['text']  = 'Texto';

        foreach ($items as $key => $item) {
            $code = $items[$key]['code'];
            $model = $this->cbService->setOption_updateOrCreate($type, $code, $items[$key]);
        }

    }

    public function seed_combo_options($type, $action)
    {
        Log::debug('seeder_0001_combo_recordtype @ seed_combo_options');

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
