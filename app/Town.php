<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{

    protected $primaryKey = 'belfiore_code';

    public function __toString()
    {
        return $this->name;
    }

}
