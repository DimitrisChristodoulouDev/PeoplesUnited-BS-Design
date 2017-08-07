<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    protected $table = 'user_login';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }


    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function userContacts(){
        $this->belongsToMany(
            Contact::class,
            ContactsRelationships::class,
            'id' ,
            'id' );
    }

    public function user_details(){
        return $this->hasOne(UserDetails::class, 'userLoginID', 'id');
    }

    public function userType(){
        return $this->hasOne(UserInGroups::class, 'userID', 'id');
    }


}
