<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    protected $table = 'user_groups';

    public function UserGroup(){
        return $this->belongsToMany(
            UserLogin::class,
            UserInGroups::class,
            'userID',
            'groupID');
    }


}
