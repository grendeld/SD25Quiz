@extends('layout')

@section ('content')

<h1>Admin Page</h1>

<a href="/admin/add">Add new admin</a>

<ul>
@foreach($admins as $a)
<li>{{$a->AdminName}}</li>
@endforeach
</ul>

@stop <!-- end of section -->
