@extends('layout')

@section ('content')

<<<<<<< HEAD
<div class="StudentsAdd">
=======

>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
<h1>Programs Page</h1>
<br/>
<table>
<tr>
<th>Program Id</th>
<th>Program Name</th>
<th>Program Type</th>
<th>Active</th>
<th>Modules</th>
</tr>

<<<<<<< HEAD

@foreach($programs as $program)
<tr>
=======
<tr>
@foreach($programs as $program)
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
<td>{{$program->ProgramID}}</td>
<td>{{$program->ProgramName}}</td>
<td>{{$program->ProgramType}}</td>
<td>{{$program->Active}}</td>

<td>
  <ul>
  @foreach($program->modules as $m)
  <li>{{$m->ModuleName}}</li>
  @endforeach
</ul>
</td>
<<<<<<< HEAD
<td><form method='get' action='program/{{$program->ProgramID}}'><button type = 'submit'>Edit Program</button></form></td>
<td><form method='get' action='program/{{$program->ProgramID}}/delete'><button type = 'submit'>Delete/Hide Program</button></form></td>
=======
<td><form method='get' action='program/{{$program->ProgramID}}'><button type = 'submit'>Edit</button></form></td>
<td><form method='get' action='program/{{$program->ProgramID}}/delete'><button type = 'submit'>Delete</button></form></td>
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
</tr>
@endforeach
<tr>
</tr>
</table>
<<<<<<< HEAD
</div>
=======

>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
<a href="/program/add">Add new program</a>



@stop <!-- end of section -->
