@extends('layout')

@section ('content')
  <div class="container-fluid">
    <div class="row BKG">
      <div class="col-md-2"></div>
      <div class="col-md-8 Panelbkg">
        <div class="AdminTables">
<h1>Add Student</h1>

<form method = "POST" action ="/student/add">

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
Email:
</td>
<td>
<textarea name="email" required ></textarea>
</td>
</tr>

<tr>
<td>
Password:
</td>
<td>
<label for="password">password</label>
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
Intake:
</td>
<td>
<select class="quizbuttonn" name='IntakeID' required>
  @foreach ($intakes as $i)
  <option value="{{$i->IntakeID}}">
    {{$i->IntakeName}}
  </option>
@endforeach
  </select>
  </td>
  </tr>
</table>
<br/><br/>
  <button class="quizbutton" type = 'submit'>submit</button>
  <a class="btn btn-default quizbutton" href="/adminHome" role="button">Cancel</a>

{!! csrf_field() !!}
</form>
</div>
</div>
<div class="col-md-2"></div>

</div>
<div>
@stop
