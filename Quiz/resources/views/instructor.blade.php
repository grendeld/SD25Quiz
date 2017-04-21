@extends('layout')

@section ('content')


<h1>Instructors Page</h1>
<br/>
<table>
<tr>
<th>Instructor Id</th>
<th>First Name</th>
<th>Last Name</th>
</tr>


@foreach($instructors as $instructor)
<tr>
<td>{{$instructor->InstructorID}}</td>
<td>{{$instructor->FirstName}}</td>
<td>{{$instructor->LastName}}</td>



<td><form method='get' action='instructor/{{$instructor->InstructorID}}'><button type = 'submit'>Edit</button></form></td>
<td><form method='get' action='instructor/{{$instructor->InstructorID}}/delete'><button type = 'submit'>Delete</button></form></td>
</tr>
@endforeach

</table>

<a href="/instructor/add">Add new instructor</a>



@stop 
