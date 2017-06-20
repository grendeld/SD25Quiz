@extends('layout')

@section ('content')

<!---MODULE LIST VIEW START--->
<br/>
<h4> My Modules:</h4>
<form method="POST" name="formModuleList">
  {!! csrf_field() !!}

  <div class="moduleListcontainer" id="moduleListcontainer">
    @foreach($modules as $m)

    <div class="QuizListCell">
        <div class="QuizListCellSelect" id="ModuleListCellName">
            <input  type="radio" name="ModID" value="{{$m->ModuleID}}" id="ModuleListItem" required />
        </div>
        <div class="QuizListCellName" id="ModuleListSelect" name = "{{$m->ModuleID}}">
            {{$m->ModuleName}}
        </div>
        <div class="QuizListCellActive">
          Active: {{$m->Active}}
        </div>
    </div>

    @endforeach
  </div>
  <button type="button" class="quizbutton" name="button" onclick="return showModuleEdit()">Edit</button>
  <button type="submit"  class="quizbutton" name="button" formaction="/moduleDelete">Delete</button>
  <button type="button" class="quizbutton" name="button" onclick="return showModuleAdd()">Add new module</button>

</form>
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
<br/>
  <button type="submit" class="quizbutton" name="button"
  formaction="/moduleSave" >Save</button>
  <button type="button" class="quizbutton" onclick="return hideModuleEdit()" name="button">Cancel</button>
</form>
</div>




  <!---MODULE BUILDER START--->
  <div id="divModuleAdd" style="display:none">

          <div class="modbuildd">
            <div class="QMSelectors">
              <br/>
              <h3>Add New Module:</h3>
              <form method="POST" action="/newModule">
                {{method_field('PUT')}}
                <label for="ProgramID">Program:</label>
              <select class="quizbuttonn" name='ProgramID'>
                @foreach($programs as $p)
                  <option value="{{$p->ProgramID}}"> {{$p->ProgramName}}</option>
                @endforeach
              </select>
              <br/><br/>
              <label for="modulename">Module Name: </label>
              <input type="text" name="ModuleName" id="moduleName"/>
            </div>
            <div class="QMSelectorss">
              <input type="submit" class="quizbutton"  value="Add Module" id="btnModuleEnter"/>
            </div>
            {!! csrf_field() !!}
          </form>
          </div>

      </div>
  <!---MODULE BUILDER ENDS--->





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
  txtModuleName.value = name;
  txtModuleID.value = id;

  return false;
  }

  function saveModuleEdit()
  {
  ModuleListViewTABcontainer.style.display = "block";
  divModuleEdit.style.display = "none";
  return true;
  }

function showModuleAdd()
{
  divModuleAdd.style.display = "block";
}

  function hideModuleEdit()
  {
  ModuleListViewTABcontainer.style.display = "block";
  divModuleEdit.style.display = "none";
  return false;
  }

  </script>

  <!---MOBILE LIST VIEW END--->


@stop
