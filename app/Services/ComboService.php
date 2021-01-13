<?php

namespace App\Services;

use App\Models\Combo;
use App\Models\Option;
use App\Models\ComboOption;

class ComboService
{

    /**
     * Returns a collection of Combos of the type indicated in the parameters
     *
     * @param string $type
     * @param string $action
     * @return \App\Models\Combo
     */
    public function getCombo_ofType(string $type, string $action)
    {

        $combo = Combo::ofType($type)->inAction($action)->first();

        return $combo;

    }

    /**
     * Returns a collection of Combos of the type indicated in the parameters
     *
     * @param string $type
     * @return \App\Models\Option
     */
    public function getOptions_ofType(string $type)
    {

        $options = Option::ofType($type)->get();

        return $options;

    }

    /**
     * Performs the update if the record exists, or creates a new one, according to the keys passed
     *
     * @param string $type
     * @param string $action
     * @param array $item
     * @return \App\Model\Combo
     */
    public function setCombo_updateOrCreate(string $type, string $action, array $item)
    {

        Combo::updateOrCreate(
            [
                'type'   => $type,
                'action' => $action
            ],
            $item
        );

    }

    /**
     * Performs the update if the record exists, or creates a new one, according to the keys passed
     *
     * @param string $type
     * @param string $action
     * @param array $item
     * @return \App\Model\Option
     */
    public function setOption_updateOrCreate(string $type, string $code, array $item)
    {

        Option::updateOrCreate(
            [
                'type' => $type,
                'code' => $item['code']
            ],
            $item
        );

    }

    /**
     * Performs the update if the record exists, or creates a new one, according to the keys passed
     *
     * @param int $combo_id
     * @param int $combo_id
     * @param array $item
     * @return \App\Model\ComboOption
     */
    public function setComboOption_updateOrCreate(int $combo_id, int $option_id, array $item)
    {

        ComboOption::updateOrCreate(
            [
                'combo_id'  => $combo_id,
                'option_id' => $option_id
            ],
            $item
        );

    }
}
