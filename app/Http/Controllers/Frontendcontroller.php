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
}
