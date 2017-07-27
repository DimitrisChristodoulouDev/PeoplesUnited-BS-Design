<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactsCategories extends Model
{
    protected $table = "contactscategories";

    public function contactCategory() {
        return $this->hasOne(ContactsCategories::class, 'id', 'categoryID');
    }
}