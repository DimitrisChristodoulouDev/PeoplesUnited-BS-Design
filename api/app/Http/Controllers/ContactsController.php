<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
   public function index(Request $request)
   {
        $rtn = Contact::get($request->fields);
        foreach ($rtn as $c) {
            $c->contactCategory;
        }
        return response()->json($rtn, 200);
   }

   public function getContact($id){

       $contact = Contact::find($id);
       $contact->contactCategory;
       return response()->json($contact, 200);
   }
}
