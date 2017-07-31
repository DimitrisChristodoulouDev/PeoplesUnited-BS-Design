<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    protected $table='clubs';

    public function clubAgent() {
        return $this->hasOne(Agent::class, 'contactID', 'clubAgent');
    }




}
