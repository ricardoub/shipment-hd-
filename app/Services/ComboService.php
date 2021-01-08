<?php

namespace App\Services;

use App\Models\Combo;
use App\Models\Option;

class ComboService
{

    public function seeder_getCombo_ofType(string $type, string $action)
    {

        $combo = Combo::ofType($type)->inAction($action)->first();

        return $combo;

    }

    public function seeder_getOptions_ofType(string $type)
    {

        $options = Option::ofType($type)->get();

        return $options;

    }

}
