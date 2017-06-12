

<div id="ModuleListViewTABcontainer" style="display:none">


  <!---MODULE LIST VIEW START--->
<h4> My Modules:</h4>
  <form method="POST" name="formModuleList">
    {!! csrf_field() !!}
    <button type="button" name="button" onclick="return showModuleEdit()">Edit</button>
    <button type="submit" name="button" formaction="/moduleDelete">Delete</button>
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
  </form>
</div>

<div class="" id="divModuleEdit" style="display:none">
  <form method="POST">
    {!! csrf_field() !!}
    <br/>
    <h3>Module Name:</h3>
    <input type="text" name="ModuleName" id="txtModuleName"/>
    <input type="hidden" name="ModuleID" id="txtModuleID">
    <h3>Active:</h3>
  <select name='Active'>
    <option id='None' value='None'>Select</option>
    <option id='optionYes' value='Yes'>Yes</option>
    <option id='optionNo' value='No'>No</option>
  </select>
  <br/>
    <button type="submit" name="button"
    formaction="/moduleSave" >Save</button>
    <button type="button" onclick="return hideModuleEdit()" name="button">Cancel</button>
  </form>
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
ModuleListViewTABcontainer.style.display = "none";
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



function hideModuleEdit()
{
ModuleListViewTABcontainer.style.display = "block";
divModuleEdit.style.display = "none";
return false;
}

</script>

<!---MOBILE LIST VIEW END--->
