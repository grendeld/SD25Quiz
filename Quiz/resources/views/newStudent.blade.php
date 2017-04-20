@extends('layout')

@section ('content')
<a href="/student">Back</a>
<h1>Add Student</h1>

<form method = "POST" action ="/student/add">
<table>
<tr>
<td>
First Name:
</td>
<td>
<textarea name="FirstName"></textarea>
</td>
</tr>

<tr>
<td>
Last Name:
</td>
<td>
<textarea name="LastName"></textarea>
</td>
</tr>
<tr>
<td>
Photo:
</td>
<td>
<input type='file' name='Photo' id='fileUpLoad'/>
<tr>
<td>
Intake Id
</td>
<td>
<select name='IntakeID'>
  <option value='SD24'>SD24</option>
   <option value='SD25'>SD25</option>
    <option value='SD2'>SD26</option>
  </select>
  </td>
  </tr>
</table>
  <button type = 'submit'>submit</button>

{!! csrf_field() !!}
</form>
@stop
