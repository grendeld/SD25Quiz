@extends('layout')

@section ('content')
<div class="container-fluid">
  <div class="row BKG">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div id="divEditProgram" class="AdminTables">
        <h1>Edit Program</h1>
        <form method = "POST" action ="../program/{{$program->ProgramID}}/edit">
        {{method_field('PATCH')}}
         <table>
           <tr>
           <td>
           Program Name:
           </td>
           <td>
           <textarea name="ProgramName">{{$program->ProgramName}}</textarea>
           </td>
           </tr>

           <tr>
           <td>
           Program Type:
           </td>
           <td>
           <select class="quizbuttonn" name='ProgramType' selected = '{{}}'>
             <option value='Health' <?php if($program->ProgramType == "Health") echo'selected'; ?>>Health</option>
             <option value='Technology' @if($program->ProgramType == "Technology"){{"selected"}} @endif>Technology</option>
             <option value='Business' @if($program->ProgramType == "Business"){{"selected"}} @endif>Business</option>
            </select>
            </td>
            <tr>

            <tr>
              <td>
                Active:
              </td>
              <td>
                <select class="quizbuttonn" name='Active' >
                <option value='Yes'<?php if($program->Active == "Yes") echo "selected"; ?>>Yes</option>
                <option value='No'@if($program->Active == "No"){{"selected"}} @endif>No</option>
                </select>
              </td>
            </tr>
            </table>
            <table>
            <tr>
              <td>Modules:</td>
              <td>
                <table>
                @foreach($program->modules as $m)
                <tr>
                <td style="color:
          <?php if ($m->Active =="Yes") echo "red"; else echo "grey";
          ?>"> {{$m->ModuleName}} </td>
                  <td>{{$m->Active}}</td>
                  <td>
                  <button class="quizbutton" type = 'submit' form="form2" formaction='{{$program->ProgramID}}/module/{{$m->ModuleID}}/edit'>Edit module</button>
                  <button class="quizbutton" type = 'submit' id='btnDel' onclick="return ModuleDelete('{{$m->ModuleID}}')"> Delete module </button>
              </td>
              </tr>

              @endforeach
         </table>
         <br/><br/>
         <button class="quizbutton" type = 'submit'>Save</button>
         <button class="quizbutton" type = "button"onclick="BackToAdminHome()">Back</button>
       {!! csrf_field() !!}
      </form>
      <br/><br/>
      <form method="get" id="form2"></form>
      <button class="quizbutton" onclick="showNewModule()">Add new module</button>
      </div>

      <div id="divNewModule" style="display:none">
      <form method="POST">
      <textarea name="ModuleName"></textarea>
      <br/>
      <button class="quizbutton" type="submit" formaction="/program/{{$program->ProgramID}}/newModule">Add Module</button>
      <button class="quizbutton" form="form2" onclick="cancelNewModule()">Cancel</button>
      {!! csrf_field() !!}
      </form>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>

<script >
function BackToAdminHome()
{
window.location.replace('/adminHome');
}

function cancelNewModule()
{
  document.getElementById('divNewModule').style.display = "none";
  document.getElementById('divEditProgram').style.display = "block";
}

function showNewModule()
{
  document.getElementById('divNewModule').style.display = "block";
  document.getElementById('divEditProgram').style.display = "none";
}

function ModuleDelete(moduleID)
{
     var token = document.getElementsByName("_token")[0].value;
    $.ajax({
      url: '/module',
      type: "post",
      data:{'ModID': moduleID,'_token':token},
      success: function(data){
        location.reload();
            }
        });

  return false;
}
</script>
@stop
