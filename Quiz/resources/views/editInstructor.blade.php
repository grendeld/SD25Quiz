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
</table>
<br/>
<button type="submit" formaction="/instructor/{{$instructor->InstructorID}}/edit">Save changes</button>
<button type="submit" form="Cancel" formaction="/adminHome">Cancel</button>
{{method_field('PATCH')}}

{!! csrf_field() !!}
</form>
<form method="get" id="Cancel">
</form>
@stop
