<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;

class ModulesController extends Controller
{
  public function deleteMod()
  {
    $id=$_POST['ModID'];
    $module = Module::find($id);
    //$module->Active = 'No';
    //$module->update(['Active'=>'No']);
    Module::where('ModuleID',$id) -> delete();
    return 'done';
  }
}
