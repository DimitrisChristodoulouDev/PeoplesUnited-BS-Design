<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactsController extends Controller
{
   public function index(Request $request)
   {
        $rtn = Contact::get($request->fields);
        foreach ($rtn as $c) {
            $c->label = $c->contactCategory->categoryLabel;
            $table = $c->contactCategory->tableNameReference;
            $c->customInfo = DB::table('agents')->where('contactID','=', $c->id)->first();
        }
        return response()->json($rtn, 200);
   }

   public function show($id){

       $contact = Contact::find($id);
       $contact->customInfo = DB::table('agents')->where('contactID','=', $contact->id)->get();
       return response()->json($contact, 200);
   }


    public function edit($id){

        $contact = Contact::find($id);
        $contact->contactCategory;
        return response()->json($contact, 200);
    }

    public function remove($id){

        $contact = Contact::find($id);
        $contact->delete();

    }

    public function removePermanently($id){
        $contact = Contact::find($id);
        $contact->history()->forceDelete();
    }





}
