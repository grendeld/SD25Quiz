@extends('layout')

@section ('content')
<a href="/instructor">Back</a>
<h1>Add Instructor</h1>

<form method = "POST" action ="/instructor/add">
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
</table>
  <button type = 'submit'>submit</button>

{!! csrf_field() !!}
</form>
@stop
