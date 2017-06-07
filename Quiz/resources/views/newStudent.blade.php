@extends('layout')

@section ('content')

<h1>Add Student</h1>

<form method = "POST" action ="/student">
  {{method_field('PUT')}}
<table>
<tr>
<td>
First Name:
</td>
<td>
<textarea name="FirstName" required ></textarea>
</td>
</tr>

<tr>
<td>
Last Name:
</td>
<td>
<textarea name="LastName" required ></textarea>
</td>
</tr>
<tr>
<td>
Photo:
</td>
<td>
<input type='file' name='Photo' id='fileUpLoad'/>
<tr>
<td>
Intake Id
</td>
<td>
<select name='IntakeID' required>
  @foreach ($intakes as $i)
  <option value="{{$i->IntakeID}}">
    {{$i->IntakeName}}
  </option>
@endforeach
  </select>
  </td>
  </tr>
</table>
  <button type = 'submit'>submit</button>
  <a href="/adminHome">Back</a>

{!! csrf_field() !!}
</form>
@stop
