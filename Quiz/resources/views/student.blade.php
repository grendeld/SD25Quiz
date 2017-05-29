@extends('layout')

@section ('content')


<h1>Students Page</h1>
<br/>
<table>
<tr>
<th>Student Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Photo</th>
<th>Intake Id</th>
</tr>


@foreach($students as $student)
<tr>
<td>{{$student->StudentID}}</td>
<td>{{$student->FirstName}}</td>
<td>{{$student->LastName}}</td>
<td><img width='50' height='50' src='storage/{{$student->Photo}}'/></td>
<td>{{$student->IntakeID}}</td>


<td><form method='get' action='student/{{$student->StudentID}}'><button type = 'submit'>Edit</button></form></td>
<td><form method='get' action='student/{{$student->StudentID}}/delete'><button type = 'submit'>Delete</button></form></td>
</tr>
@endforeach

</table>

<a href="/newStudent">Add new student</a>



@stop
