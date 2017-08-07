<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ContactsCategories extends Model
{
    protected $table = "contacts_categories";

    public function contactCategory() {
        return $this->hasOne(Contact::class, 'id', 'categoryID');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

//    protected $hidden = [];
}