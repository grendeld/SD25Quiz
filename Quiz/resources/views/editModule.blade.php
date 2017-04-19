@extends('layout')

@section ('content')

<h1>Edit Module</h1>
<h3>Program:</h3>{{$program->ProgramName}}

<form method="post">
<h3>Module:</h3>
<textarea name="ModuleName">
{{$module->ModuleName}}
</textarea>
<br/>
  <h3>Active:</h3>
<select name='Active'>
  <option value='Yes'<?php if($module->Active == "Yes") echo "selected"; ?>>Yes</option>
  <option value='No'@if($module->Active == "No"){{"selected"}} @endif>No</option>
</select>
<br/>
<button type="submit" formaction="/{{$program->ProgramID}}/{{$module->ModuleID}}">Save changes</button>
<button type="submit" form="Cancel" formaction="/program/{{$program->ProgramID}}">Cancel</button>
{{method_field('PATCH')}}
{!! csrf_field() !!}
</form>


<form method="get" id="Cancel">
</form>


@stop
