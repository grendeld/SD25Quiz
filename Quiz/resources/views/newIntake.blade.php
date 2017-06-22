@extends('layout')

@section ('content')
<a href="/intake">Back</a>
<h1>Add intake</h1>
<form method = "POST" action ="/intake/add">
<table>
<tr>
<td>
Intake Name:
</td>
<td>
<textarea name="IntakeName"></textarea>
</td>
</tr>

<tr>
<td>
Program Id:
</td>
<td>
<select name='ProgramID'>
  <option value='1'>Software Development</option>
  <option value='2'>Business Administration</option>
 </select>
 </td>
 <tr>

<tr>
<td>
Instructor Id:
</td>
<td>
<select name='InstructorID'>
  <option value='1'>Doug Jackson</option>
  <option value='2'>Brian Westbrook</option>
 </select>
 </td>
 <tr>

  <button type = 'submit'>submit</button>

{!! csrf_field() !!}
</form>
@stop
