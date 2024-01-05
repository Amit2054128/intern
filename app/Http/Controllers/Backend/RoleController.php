<?php

namespace App\Http\Controllers\Backend;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $user = User::all();
        return view('Backend.Page.users.index',compact('user'));
    }

    public function makeAdmin($id){
        
$user = User::findOrFail($id);
$user->is_role = 1;
$user->save();
toast('Role Granted successfully','error');

return redirect()->back();
    }

public function makeUSer($id){
$user = User::findOrFail($id);
$user->is_role = 0;
$user->save();
toast('Role Denied successfully','success');
return redirect()->back();

        
        
    }
}
