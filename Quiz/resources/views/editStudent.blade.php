@extends('layout')

@section ('content')



<div id="divEditStudent">

<h1>Edit Student</h1>

<form method = "POST" action ="../student/{{$student->StudentID}}/edit" enctype="multipart/form-data">
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
Email:
</td>
<td>
<textarea name="email">{{$student->email}}</textarea>
</td>
</tr>

<tr>
<td>
Password:
</td>
<td>
<textarea name="password">{{$student->password}}</textarea>
</td>
</tr>


<tr>
<td>
Photo
</td>
<td>
<img width='100' height='100' src='/storage/{{$student->Photo}}'/></td>
</td>
</tr>

<tr>
<td>
<input type='file' name='Photo' id='fileUpLoad'/>
</td>
</tr>

<tr>
<td>
Intake:
</td>
<td>
 <select name='IntakeID'>
   @foreach ($intakes as $i)
   <option value="{{$i->IntakeID}}" @if($student->IntakeID == $i->IntakeID) {{"selected"}} @endif>
     {{$i->IntakeName}}
   </option>
 @endforeach
   </select>
 </td>
 </tr>
</table>
<br/>
<button type="submit" formaction="/student/{{$student->StudentID}}/edit">Save changes</button>
<a class="btn btn-default" href="/adminHome" role="button">Cancel</a>
{{method_field('PATCH')}}

{!! csrf_field() !!}
</form>



@stop
