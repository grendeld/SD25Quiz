@extends('layout')

@section ('content')

<div id="divEditInstructor">

<h1>Edit Instructor</h1>

<form method = "POST" action ="../instructor/{{$instructor->InstructorID}}/edit">
{{method_field('PATCH')}}
<table>
<tr>
<td>
First Name:
</td>
<td>
<textarea name="FirstName">{{$instructor->FirstName}}</textarea>
</td>
</tr>

<tr>
<td>
Last Name:
</td>
<td>
<textarea name="LastName">{{$instructor->LastName}}</textarea>
</td>
</tr>

<tr>
<td>
Email:
</td>
<td>
<textarea name="email">{{$instructor->email}}</textarea>
</td>
</tr>

<tr>
<td>
Password:
</td>
<td>
<textarea name="password">{{$instructor->password}}</textarea>
</td>
</tr>
</table>
<br/>
<button type="submit" formaction="/instructor/{{$instructor->InstructorID}}/edit">Save changes</button>
<a class="btn btn-default" href="/adminHome" role="button">Cancel</a>
{{method_field('PATCH')}}

{!! csrf_field() !!}
</form>

@stop
