@extends('layout')

@section ('content')

  <div class="container-fluid BKG">
    <div class="row">
      <div class="col-md-12 Panelbkg">
        <div class="col-md-3">
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
        <div class="col-md-9"></div>

      </div>
    </div>
  </div>
@stop
