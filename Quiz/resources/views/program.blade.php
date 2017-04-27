@extends('layout')

@section ('content')


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


@foreach($programs as $program)
<tr>
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
<td><form method='get' action='program/{{$program->ProgramID}}'><button type = 'submit'>Edit Program</button></form></td>
<td><form method='get' action='program/{{$program->ProgramID}}/delete'><button type = 'submit'>Delete/Hide Program</button></form></td>
</tr>
@endforeach
<tr>
</tr>
</table>

<a href="/program/add">Add new program</a>



@stop <!-- end of section -->
