@extends('layout')

@section ('content')

<div id="divEditProgram">

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
<select name='ProgramType' selected = '{{}}'>
  <option value='Health' <?php if($program->ProgramType == "Health") echo"selected"; ?>>Health</option>
  <option value='Technology'@if($program->ProgramType == "Technology"){{"selected"}} @endif>Technology</option>
  <option value="Business" @if($program->ProgramType == "Business"){{"selected"}} @endif>Business</option>
 </select>
 </td>
 <tr>

<tr>
<td>
Active:
</td>
<td>
<select name='Active' >
  <option value='Yes'<?php if($program->Active == "Yes") echo "selected"; ?>>Yes</option>
  <option value='No'@if($program->Active == "No"){{"selected"}} @endif>No</option>
  </select>
  </td>
  </tr>

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
        <button type = 'submit' form="form2" formaction='{{$program->ProgramID}}/module/{{$m->ModuleID}}/edit'>Edit module</button>
        <button type = 'submit' id='btnDel' onclick="return ModuleDelete('{{$m->ModuleID}}')"> Delete module </button>
    </td>
    </tr>
    @endforeach

</table>
  </td>
      <td>
  </tr>
</table>
  <button type = 'submit'>Save</button> <button type = "button"onclick="BackToAdminHome()">Back</button>
{!! csrf_field() !!}
</form>

<form method="get" id="form2"></form>
<button onclick="showNewModule()">Add new module</button>
</div>

<div id="divNewModule" style="display:none">
<form method="POST">
<textarea name="ModuleName"></textarea>
<br/>
<button type="submit" formaction="/program/{{$program->ProgramID}}/newModule">Add Module</button>
<button form="form2" onclick="cancelNewModule()">Cancel</button>
{!! csrf_field() !!}
</form>

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
