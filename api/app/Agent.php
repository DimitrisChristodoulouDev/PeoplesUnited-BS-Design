<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = "agents";
    protected $fillable = ['contactID'];
    protected $primary = ['id'];

    public function agentClubs() {
        return $this->hasMany('App\Clubs', 'clubAgent', 'contactID');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }


}
