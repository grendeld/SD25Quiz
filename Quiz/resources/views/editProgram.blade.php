@extends('layout')

@section ('content')

<div id="divEditProgram">
<<<<<<< HEAD
<div class="AdminTables">
=======
<a href="/program">Back to Programs</a>

>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
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
<<<<<<< HEAD
  <button type = 'submit'>Save</button> <button type = "button"onclick="BackToAdminHome()">Back</button>
{!! csrf_field() !!}
</form>
</div>
<form method="get" id="form2"></form>
=======
  <button type = 'submit'>Save</button>
{!! csrf_field() !!}
</form>

<form method="get" id="form2">
</form>

>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
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
<<<<<<< HEAD
function BackToAdminHome()
{
window.location.replace('/adminHome');
}
=======
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8

function cancelNewModule()
{
  document.getElementById('divNewModule').style.display = "none";
  document.getElementById('divEditProgram').style.display = "block";
}
<<<<<<< HEAD

=======
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
function showNewModule()
{
  document.getElementById('divNewModule').style.display = "block";
  document.getElementById('divEditProgram').style.display = "none";
}

<<<<<<< HEAD
function ModuleDelete(moduleID)
{
=======

function ModuleDelete(moduleID)
{
  //alert(moduleID);
    // $.ajax({
    //   url: '/module',
    //   type: "get",
    //
    //
    //   data:{'ModID': moduleID},
    //   success: function(data){
    //     alert(data);
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
     var token = document.getElementsByName("_token")[0].value;
    $.ajax({
      url: '/module',
      type: "post",
      data:{'ModID': moduleID,'_token':token},
      success: function(data){
        location.reload();
<<<<<<< HEAD
            }
        });
=======
      }
    });
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8

  return false;
}
</script>
@stop
