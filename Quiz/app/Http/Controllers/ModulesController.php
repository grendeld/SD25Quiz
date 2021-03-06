<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Program;
use DB;

class ModulesController extends Controller
{

  public function deleteModule() //new // Set module inactive
  {
    if (isset($_POST['ModID']))
  {

    $id=$_POST['ModID'];
    $module = Module::where('ModuleID',$id);

    $quizzes_in_module = DB::table('quizzes')->where('ModuleID','=',$id)->count();
    if ($quizzes_in_module > 0)
    {
      $module-> update(['Active'=>'No']);
    }
    else
    {
      $module->delete();
    }
  }
    return back();
  }

  public function saveModule(Request $request) //new
  {
    $id=$request->ModuleID;
    $module = Module::find($id);
    $module->ModuleName = $request->ModuleName;
    $module->Active=$request->Active;
    $module->save();
    session(['Panel' => '1']); //show ModuleListViewTABcontainer
    return back();
  }

  public function editModule() //new
  {

  }

  public function showEdit($p, $m)
  {
    $module=Module::find($m);
    $program=Program::find($p);
    return view ('editModule', compact('program','module'));
  }

  public function edit(Request $request, $p, $m)
  {
    $module=Module::find($m);
    $module->update($request->all());
    return redirect("/program/$p");
  }

  public function NewModule(Request $request, $p)
  {
    $module=new Module;
    $module->ModuleName = $request->ModuleName;
    $program=Program::find($p);
    $program->modules()->save($module);
    return redirect("/program/$p");
  }

  public function AddModule(Request $request) //new
  {
    $module=new Module;
    $module->ModuleName = $request->ModuleName;
    $program=Program::find($request->ProgramID);
    $program->modules()->save($module);
    return back();
  }
}
