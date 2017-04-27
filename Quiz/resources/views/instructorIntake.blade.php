@extends('layout')

@section ('content')


<h1>InstructorIntakes Page</h1>
<br/>
<table>
<tr>
<th>Instructor Id</th>
<th>Intake Id</th>
</tr>

@foreach($instructorIntakes as $instructorIntake)
<tr>
<td>{{$instructorIntake->InstructorID}}</td>
<td>{{$instructorIntake->IntakeID}}</td>


</tr>
@endforeach

</table>