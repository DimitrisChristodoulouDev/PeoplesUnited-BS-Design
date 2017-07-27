<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContactsCategories;

class Contact extends Model
{
    protected $table = 'contacts';


    public function contactCategory()
    {
        return $this->hasOne(ContactsCategories::class, 'id', 'categoryID');
    }

}
