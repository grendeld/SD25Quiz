@extends('layout')

@section ('content')


<h1>Intakes Page</h1>
<br/>
<table>
<tr>
<th>Intake Id</th>
<th>Intake Name</th>
<th>Program Id</th>
<th>Instructor Id</th>
</tr>

@foreach($intakes as $intake)
<tr>
<td>{{$intake->IntakeID}}</td>
<td>{{$intake->IntakeName}}</td>
<td>{{$intake->ProgramID}}</td>
<td>{{$intake->InstructorID}}</td>

<td><form method='get' action='intake/{{$intake->IntakeID}}'><button type = 'submit'>Edit</button></form></td>
<td><form method='get' action='intake/{{$intake->IntakeID}}/delete'><button type = 'submit'>Delete</button></form></td>
</tr>
@endforeach

</table>

<a href="/intake/add">Add new intake</a>