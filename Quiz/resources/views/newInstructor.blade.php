@extends('layout')
@section ('header')
<title>Admin Add Instructor</title>
<link rel="stylesheet" href="css/adminstyles.css">
<script type="text/javascript" src="js/adminHome.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<!--[if IE]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
@stop

@section ('content')
<a href="/instructor">Back</a>

<div class="AdminAddInstructor">
  <h3>Add Instructor</h3>
<form method = "POST" action ="/instructor/add">
<table>
<tr>
<td>
First Name:
</td>
<td>
<textarea name="FirstName"></textarea>
</td>
</tr>

<tr>
<td>
Last Name:
</td>
<td>
<textarea name="LastName"></textarea>
</td>
</tr>
</table>
  <button type = 'submit'>submit</button>

{!! csrf_field() !!}
</form>
</div>
@stop
