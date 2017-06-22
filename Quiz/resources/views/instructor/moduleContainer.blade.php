@extends('layout')

@section ('content')

<<<<<<< Updated upstream
  <div class="container-fluid">
    <div class="row BKG">
      <div class="col-md-2"></div>
      <div class="col-md-8 Panelbkg">
        <div id="moduleTABcontainer" style="display:block">

        <!---MODULE LIST VIEW START--->
        <div class="AdminTables">
        <h1> My Modules:</h1>
        <form method="POST" name="formModuleList">
          {!! csrf_field() !!}

          <div class="moduleListcontainer" id="moduleListcontainer">

                <table>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>
                      <button type="button" class="quizbutton"
                      name="button" onclick="return showModuleAdd()">
                      Add new module
                      </button>
                    </th>
                  </tr>
                  @foreach($modules as $m)
                  <tr>
                    <td>
                      <input  type="radio" name="ModID" value="{{$m->ModuleID}}" id="ModuleListItem" required />
                    </td>
                    <td>
                      {{$m->ModuleName}}
                    </td>
                    <td>
                      Active: {{$m->Active}}
                    </td>
                    <td></td>
                  </tr>
                @endforeach
                </table>

            </div>



          <br/>
          <button type="button" class="quizbutton" name="button" onclick="return showModuleEdit()">Edit</button>
          <button type="submit"  class="quizbutton" name="button" formaction="/moduleDelete">Delete</button>
        </div>
        </form>
=======
<div class="container-fluid">
  <div class="row BKG">
    <div class="col-md-2"></div>
    <div class="col-md-8 Panelbkg">
      <div class="moduleNew" id="moduleTABcontainer" style="display:block">

      <!---MODULE LIST VIEW START--->
      <br/>
      <h1> My Modules:</h1>
      <form method="POST" name="formModuleList">
        {!! csrf_field() !!}

        <div class="moduleListcontainer" id="moduleListcontainer">

<div class="AdminTables">
        <table>
          <tr>

            <th></th>
            <th>Name</th>
            <th>Active</th>
            <th>
              <button type="button" class="quizbutton"
              name="button" onclick="return showModuleAdd()">
              Add new module
              </button>
            </th>
          </tr>
          @foreach($modules as $m)
          <tr>
            <td>
              <input  type="radio" name="ModID" value="{{$m->ModuleID}}" id="ModuleListItem" required />
            </td>
            <td>
              {{$m->ModuleName}}
            </td>
            <td>
              Active: {{$m->Active}}
            </td>
            <td></td>
          </tr>
        @endforeach
        </table>

  </div>


>>>>>>> Stashed changes
        </div>

        <div id="divModuleEdit" style="display:none">
            <form method="POST">
              {!! csrf_field() !!}
              <br/>
              <h3>Module Name:</h3>
              <input type="text" name="ModuleName" id="txtModuleName"/>
              <input type="hidden" name="ModuleID" id="txtModuleID">
              <h3>Active:</h3>
            <select class="quizbuttonn" name='Active'>
              <option id='None' value='None'>Select</option>
              <option id='optionYes' value='Yes'>Yes</option>
              <option id='optionNo' value='No'>No</option>
            </select>
            <br/><br/>
              <button type="submit" class="quizbutton" name="button"
              formaction="/moduleSave" >Save</button>
              <button type="button" class="quizbutton" onclick="return hideModuleEdit()" name="button">Cancel</button>
            </form>
        </div>




          <!---MODULE BUILDER START--->
          <div id="divModuleAdd" style="display:none" >

                    <div class="QMSelectorsss">
                      <br/>
                      <h3>Add New Module:</h3>
                      <form method="POST" action="/newModule">
                        {{method_field('PUT')}}
                        <label for="ProgramID">Program:</label>
                        <select class="quizbuttonn" name='ProgramID' required>
                          @foreach($programs as $p)
                            <option value="{{$p->ProgramID}}"> {{$p->ProgramName}}</option>
                          @endforeach
                        </select>
                        <br/><br/>
                        <label for="modulename">Module Name: </label>
                        <input type="text" name="ModuleName" id="moduleName" required/>
                    </div>
                    <br/>
                    <div class="QMSelectorss">
                        <input type="submit" class="quizbutton"  value="Add Module" id="btnModuleEnter"/>
                        <button type="button" class="quizbutton" onclick="return hideModuleAdd()" name="button">Cancel</button>
                    </div>
                    {!! csrf_field() !!}
                  </form>
                  </div>
<<<<<<< Updated upstream
            </div>
=======
                  <br/><br/>
                  <div class="QMSelectorss">
                    <input type="submit" class="quizbutton"  value="Add Module" id="btnModuleEnter"/>
                    <button type="button" class="quizbutton" onclick="return hideModuleAdd()" name="button">Cancel</button>
                  </div>
                  {!! csrf_field() !!}
                </form>
                </div>
          </div>
>>>>>>> Stashed changes

          <!---MODULE BUILDER ENDS--->

      </div>
      <div class="col-md-2"></div>
    </div>
  </div>



  <script>

  function showModuleEdit()
  {
  var id = document.querySelector('input[name="ModID"]:checked').value;
  var modules = {!! json_encode($modules) !!};
  var name = modules[id-1].ModuleName;

  if (modules[id-1].Active == "Yes"){
  document.getElementById('optionYes').selected = "selected";
  }
  else {
  document.getElementById('optionNo').selected = "selected";
  }
  //ModuleListViewTABcontainer.style.display = "none";
  divModuleEdit.style.display = "block";
  moduleTABcontainer.style.display = "none";
  txtModuleName.value = name;
  txtModuleID.value = id;

  return false;
  }

  function saveModuleEdit()
  {
  //ModuleListViewTABcontainer.style.display = "block";
  divModuleEdit.style.display = "none";
  return true;
  }

function showModuleAdd()
{
  divModuleAdd.style.display = "block";
  moduleTABcontainer.style.display = "none";
}

function hideModuleAdd()
{
moduleTABcontainer.style.display = "block";
divModuleAdd.style.display = "none";
return false;
}

  function hideModuleEdit()
  {
  moduleTABcontainer.style.display = "block";
  divModuleEdit.style.display = "none";
  return false;
  }

  </script>

  <!---MOBILE LIST VIEW END--->


@stop
