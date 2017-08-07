<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\ContactsCategories;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contacts';
    protected $dates = ['deleted_at'];

    /*  use SoftDeletes;
      protected $dates = ['deleted_at', 'updated_at'];*/

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format("F j, Y");
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format("F j, Y");
    }

    public function contactCategory() {
        return $this->hasOne(ContactsCategories::class, 'id', 'categoryID');
    }

    public function relationWith(){
        return $this->belongsToMany(
            UserLogin::class,
            ContactsRelationships::class,
            'id',
            'userID');
    }
}
