@extends('layout')

@section ('content')

<div id="divEditIntake">
<a href="/intake">Back to Intakes</a>

<h1>Edit Intake</h1>
<form method = "POST" action ="../intake/{{$intake->IntakeID}}/edit">
{{method_field('PATCH')}}
<table>
<tr>
<td>
Intake Name:
</td>
<td>
<textarea name="IntakeName">{{$intake->IntakeName}}</textarea>
</td>
</tr>

<tr>
<td>
Program Id
</td>
<td>
<select name='ProgramID' selected = '{{}}'>
  <option value='1' <?php if($intake->ProgramID =="1") echo "selected"; ?>>Software Development</option>
  <option value='2' @if($intake->ProgramID =="2"){{"selected"}} @endif>Business Administration</option>
  </select>
 </td>
 </tr>

 <tr>
<td>
Instructor Id
</td>
<td>
<select name='InstructorID' selected = '{{}}'>
  <option value='1' <?php if($intake->InstructorID =="1") echo "selected"; ?>>Doug Jackson</option>
  <option value='2' @if($intake->InstructorID =="2"){{"selected"}} @endif>Brian Westbrook</option>
  </select>
 </td>
 </tr>

</table>
<br/>
<button type="submit" formaction="/intake/{{$intake->IntakeID}}/edit">Save changes</button>
<button type="submit" form="Cancel" formaction="/intake/{{$intake->IntakeID}}">Cancel</button>
{{method_field('PATCH')}}
  
{!! csrf_field() !!}
</form>
<form method="get" id="Cancel">
</form>
@stop




