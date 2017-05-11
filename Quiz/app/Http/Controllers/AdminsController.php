<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Instructor;

class AdminsController extends Controller
{

public function main(){
$instructors = Instructor::all();

  return view('AdminHome',compact ('instructors'));
}


  public function show()
  {
    $admins=Admin::all();
    return view ('admin', compact('admins'));
  }
    public function create(Request $request)
    {
      $admin = new Admin;
      $admin->AdminNAme = $request->AdminName;
      $admin->Password = $request->Password;
      $admin->save();

      return back();
    }
}
