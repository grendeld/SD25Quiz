@extends('layout')

@section ('content')


<h1>Add Program</h1>

<form method = "POST" action ="/program/add">
<table>
<tr>
<td>
Program Name:
</td>
<td>
<textarea name="ProgramName"></textarea>
</td>
</tr>

<tr>
<td>
Program Type:
</td>
<td>
<select name='ProgramType'>
  <option value='Health'>Health</option>
  <option value='Technology'>Technology</option>
  <option value="Business">Business</option>
 </select>
 </td>
 <tr>

<tr>
<td>
Active:
</td>
<td>
<select name='Active'>
  <option value='Yes'>Yes</option>
  <option value='No'>No</option>
  </select>
  </td>
  </tr>
</table>
  <button type = 'submit'>submit</button>
  <a class="btn btn-default" href="/adminHome" role="button">Back</a>

{!! csrf_field() !!}
</form>
@stop
