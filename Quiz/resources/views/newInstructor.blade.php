@extends('layout')

@section ('content')


<h1>Add Instructor</h1>

<form method = "POST" action ="/instructor/add">
<table>
<tr>
<td>
First Name:
</td>
<td>
<textarea name="FirstName" required></textarea>
</td>
</tr>

<tr>
<td>
Last Name:
</td>
<td>
<textarea name="LastName" required></textarea>
</td>
</tr>
</table>
  <button type = 'submit'>submit</button>
  <a class="btn btn-default" href="/adminHome" role="button">Back</a>

{!! csrf_field() !!}
</form>
@stop
