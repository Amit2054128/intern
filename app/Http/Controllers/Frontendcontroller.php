<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class Frontendcontroller extends Controller
{
  public function index(){
    return view('Frontend.Home');
  }

  public function about($id){
    echo $id;
    return view('Frontend.About');
  }

  public function contact(){
    return view('Frontend.Page.Contact.contact');
  }

  public function post(Request $request){
$contact =  new Contact();
$contact->name = $request->full_name;
$contact->address = $request->address;
$contact->phone_number = $request->phone_number;
$contact->contact  = $request->contact;
$contact->save();
return redirect()->back();
  }

  public function contactList(){
    $contact = Contact::all();
    
    return view('Frontend.Page.Contact.contactList',compact('contact'));
  }

  public function edit($id){
    $contact = Contact::findOrFail($id);
    return view('Frontend.Page.Contact.edit',compact('contact'));
  }

  public function update(Request $request, $id){
    $contact = Contact::findOrFail($id);
    $contact->name = $request->full_name;
$contact->address = $request->address;
$contact->phone_number = $request->phone_number;
$contact->contact  = $request->contact;
$contact->update();
return redirect()->back();
    
  }

  public function delete($id){
    $contact = Contact::findOrFail($id);
    $contact->delete();
    return redirect()->back();
  }
}
