@extends('layout')

@section ('content')
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<div class="container-fluid BKG">
  <div class="row">
    <div class="col-md-12 Panelbkg">
      <div class="col-md-3">
            <div class="AdminTables">

<hr>
<h1>Tests:</h1>
<hr>
<table>
  <tr>
    <th>Quiz</th>
    <th>Start</th>
    <th>Stop</th>
  </tr>
@foreach($tests as $t)
<tr>
  <td>{{$t->quiz->QuizName}}</td>
  <td>{{$t->StartDateTime}}</td>
  <td>{{$t->StopDateTime}}</td>
</tr>
@endforeach
</table>
<hr>
=======
=======
>>>>>>> Stashed changes
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="reportCell">
          <div class="reportPart">
            @include('chartTest')
          </div>
          <div class="reportPart"></div>
      </div>
      <div class="AdminTables">
      <h1>Tests:</h1>
      <hr>
      <table>
        <tr>
          <th>Quiz</th>
          <th>Start</th>
          <th>Stop</th>
        </tr>
      @foreach($tests as $t)
      <tr>
        <td>{{$t->QuizName}}</td>
        <td>{{$t->StartDateTime}}</td>
        <td>{{$t->StopDateTime}}</td>
      </tr>
      @endforeach
      </table>
      <hr>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
</div>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes


      </div>

    </div>

      <div class="col-md-9">

            @include('chartTest')

      </div>

    </div>



  </div>
</div>
@stop
