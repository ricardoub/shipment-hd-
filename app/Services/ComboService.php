<?php

namespace App\Services;

use App\Models\Combo;
use App\Models\Option;

class ComboService
{

    public function getCombo_ofType(string $type, string $action)
    {

        $combo = Combo::ofType($type)->inAction($action)->first();

        return $combo;

    }

    public function getOptions_ofType(string $type)
    {

        $options = Option::ofType($type)->get();

        return $options;

    }

}
