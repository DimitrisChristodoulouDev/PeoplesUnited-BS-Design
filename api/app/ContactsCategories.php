<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactsCategories extends Model
{
    protected $table = "contactscategories";

    public function contactCategory() {
        return $this->hasOne(Contact::class, 'id', 'categoryID');
    }

    protected $hidden = ['id'];
}