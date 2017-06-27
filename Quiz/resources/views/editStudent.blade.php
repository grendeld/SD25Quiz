@extends('layout')

@section ('content')

  <div class="container-fluid">
    <div class="row BKG">
      <div class="col-md-2"></div>
      <div class="col-md-8 Panelbkg">
        <div id="divEditStudent AdminTables">

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
        <td></td>
        </tr>

        <tr>
        <td>
        Intake:
        </td>
        <td>
         <select class="quizbuttonn" name='IntakeID'>
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
        <button class="quizbutton" type="submit" formaction="/student/{{$student->StudentID}}/edit">Save changes</button>
        <a class="btn btn-default quizbutton" href="/adminHome" role="button">Cancel</a>
        {{method_field('PATCH')}}

        {!! csrf_field() !!}
        </form>
      </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
@stop
