<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = "agents";

    public function agentClubs() {
        return $this->hasMany('App\Clubs', 'clubAgent', 'contactID');
    }


    protected $hidden = ['contactID'];
    protected $fillable = ['contactID'];

}
