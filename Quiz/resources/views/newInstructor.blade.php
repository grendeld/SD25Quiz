@extends('layout')

@section ('content')

<div class="container-fluid">
  <div class="row BKG">
    <div class="col-md-2"></div>
    <div class="col-md-8 Panelbkg">
      <div class="AdminTables">
      <h1>Add Instructor</h1>

      <form method = "POST" action ="/instructor/add">
      <table>
      <tr>
      <td>
      First Name:
      </td>
      <td>
      <textarea name="FirstName" required></textarea>
      </td>
      </tr>

      <tr>
      <td>
      Last Name:
      </td>
      <td>
      <textarea name="LastName" required></textarea>
      </td>
      </tr>
      </table>
      <br/><br/>
        <button type = 'submit'>submit</button>
        <a class="btn btn-default quizbutton" href="/adminHome" role="button">Back</a>

      {!! csrf_field() !!}
      </form>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@stop
