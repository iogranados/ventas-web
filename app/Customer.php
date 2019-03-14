<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Customer extends Model
{
    protected $appends = array('dniType');

    public function getDniTypeAttribute(){
        return $this->getDniType($this->CODENTIDAD);
    }

    private function getDniType($dniCode){
        return Config::get('constants.dniType.'.$dniCode);
    }
}
