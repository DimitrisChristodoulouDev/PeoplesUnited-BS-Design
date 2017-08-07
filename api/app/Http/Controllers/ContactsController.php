<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Clubs;
use App\Contact;
use App\ContactsCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $rtn = Contact::all();
        foreach ($rtn as $c) {
            $c->contactCategory;
            $c->customInfo = DB::table('agents')->where('contactID', '=', $c->id)->first();//agent.contactID = contacts.id
        }
        $categories = ContactsCategories::all();
        return response()->json(['contacts'=>$rtn, 'categories'=>$categories], 200);
    }

    public function show($id)
    {



        $contact = Contact::findOrFail($id);
        $contact->customInfo = DB::table('agents')->where('contactID', '=', $contact->id)->get();

        if ($contact->contactCategory->tableNameReference == 'agents') {
            $agent = Agent::where('contactID', '=', $contact->id)->first();
            $contact->team = $agent->agentClubs;
            $contact->next = Agent::where('contactID','>', $agent->contactID)->first(['contactID']);
//            $contact->previous = Agent::where('contactID','<', $agent->contactID)->first(['contactID']);
        }

        return response()->json($contact, 200);
    }

    public function editPersonal(Request $request, $id)
    {

        $contact = Contact::find($id);
        $contact->name = $request->firstName;
        $contact->surname = $request->lastName;
        $contact->notes = $request->notes;
        $contact->mobile = $request->mobile;
        if ($request->has('importantPeople')) $contact->importantPeople = $request->importantPeople;
        $contact->countryLiving = $request->countryLiving;

        if ($contact->save()) return response()->json(['status' => 200]);
        return response(['status' => 303]);
    }

    public function editAditional(Request $request, $id)
    {

        $contact = Contact::find($id);
        $contact->name = $request->firstName;
        $contact->surname = $request->lastName;
        $contact->notes = $request->notes;
        $contact->

        $data = json_decode($request, true);


//        $contact->contactCategory;
        return response()->json($request, 200);
    }

    public function editAvatar(Request $request, $id)
    {

        $contact = Contact::find($id);
        $contact->name = $request->firstName;
        $contact->surname = $request->lastName;
        $contact->notes = $request->notes;
        $contact->

        $data = json_decode($request, true);


//        $contact->contactCategory;
        return response()->json($request, 200);
    }

    public function editSpecific(Request $request, $id)
    {

        $contact = Contact::find($id);
        $contact->name = $request->firstName;
        $contact->surname = $request->lastName;
        $contact->notes = $request->notes;
        $contact->

        $data = json_decode($request, true);


//        $contact->contactCategory;
        return response()->json($request, 200);
    }


    public function deleteSoft($id)
    {

        $contact = Contact::findOrFail($id);
        if($contact->delete())
            return response()->json(['status'=>1],200);
        else
            return response()->json('',300);
    }

    public function removePermanently($id)
    {
        $contact = Contact::find($id);
        $contact->history()->forceDelete();
    }
    /*
     * @idea
     * */

}
