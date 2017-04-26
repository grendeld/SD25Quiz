@extends('layout')

@section ('content')

<div id="divEditStudent">
<a href="/student">Back to Programs</a>

<h1>Edit Student</h1>

<form method = "POST" action ="../student/{{$student->StudentID}}/edit">
{{method_field('PATCH')}}
<table>
<tr>
<td>
First Name:
</td>
<td>
<textarea name="FirstName">{{$student->FirstName}}</textarea>
</td>
</tr>

<tr>
<td>
Last Name:
</td>
<td>
<textarea name="LastName">{{$student->LastName}}</textarea>
</td>
</tr>

<tr>
<td>
Photo
</td>
<td>
<img width='50' height='50' src='/storage/{{$student->Photo}}'/></td>
</td>
</tr>

<tr>
<td>
<input type='file' name='Photo' id='fileUpLoad'/>
</td>
</tr>

<tr>
<td>
Intake Id
</td>
<td>
<select name='IntakeID' selected = '{{}}'>
  <option value='SD24' <?php if($student->IntakeID =="SD24") echo "selected"; ?>>SD24</option>
  <option value='SD25' @if($student->IntakeID =="SD25"){{"selected"}} @endif>SD25</option>
  <option value='SD26' @if($student->IntakeID =="SD26"){{"selected"}} @endif>SD26</option>
 </select>
 </td>
 </tr>
</table>
<br/>
<button type="submit" formaction="/student/{{$student->StudentID}}/edit">Save changes</button>
<button type="submit" form="Cancel" formaction="/student/{{$student->StudentID}}">Cancel</button>
{{method_field('PATCH')}}
  
{!! csrf_field() !!}
</form>
<form method="get" id="Cancel">
</form>
@stop
