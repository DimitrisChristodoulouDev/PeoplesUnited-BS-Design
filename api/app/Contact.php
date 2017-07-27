<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContactsCategories;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    protected $table = 'contacts';
  /*  use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at'];*/



    public function contactCategory() {
        return $this->hasOne(ContactsCategories::class, 'id', 'categoryID');
    }

}
