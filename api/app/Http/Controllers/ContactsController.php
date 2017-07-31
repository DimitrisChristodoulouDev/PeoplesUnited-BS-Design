<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Clubs;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactsController extends Controller
{
   public function index(Request $request)
   {
        $rtn = Contact::where('categoryID','=', 2)->get();//$request->fields);
        foreach ($rtn as $c) {
            $c->contactCategory;
//          $c->customInfo = DB::table('agents')->where('contactID','=', $c->id)->first();//agent.contactID = contacts.id
          $c->customInfo = DB::table('agents')->where('contactID','=', $c->id)->first();//agent.contactID = contacts.id
        }
        return response()->json($rtn, 200);
   }

   public function show($id){

       $contact = Contact::find($id);
       $contact->customInfo = DB::table('agents')->where('contactID','=', $contact->id)->get();

       if($contact->contactCategory->tableNameReference == 'agents'){
           $agent = Agent::where('contactID','=', $contact->id)->first();
           $contact->team = $agent->agentClubs;

       }

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
