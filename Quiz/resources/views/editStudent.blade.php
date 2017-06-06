@extends('layout')

@section ('content')

<div id="divEditStudent">


<h1>Edit Student</h1>

<form method = "POST" action ="../student/{{$student->StudentID}}/edit">
{{method_field('PATCH')}}
<table>
<tr>
<td>
First Name:
</td>
<td>
<textarea name="FirstName">{{$student->FirstName}}</textarea>
</td>
</tr>

<tr>
<td>
Last Name:
</td>
<td>
<textarea name="LastName">{{$student->LastName}}</textarea>
</td>
</tr>

<tr>
<td>
Photo
</td>
<td>
<img width='50' height='50' src='/storage/{{$student->Photo}}'/></td>
</td>
</tr>

<tr>
<td>
<input type='file' name='Photo' id='fileUpLoad'/>
</td>
</tr>

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
<br/>
<button type="submit" formaction="/student/{{$student->StudentID}}/edit">Save changes</button>
<button type = "button" onclick="window.location.href='/adminHome'">Cancel</button>
{{method_field('PATCH')}}

{!! csrf_field() !!}
</form>

@stop
