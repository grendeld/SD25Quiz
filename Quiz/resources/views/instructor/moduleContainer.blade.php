<div id="moduleTABcontainer">
  <div class="row">
    <div class="col-md-6">
      <!---MODULE BUILDER START--->
                    <div class="modbuildcontainer">
                      <div class="modbuild">
                          <div class="QMSelectors">
                            <input type="button" id="MymoduleView" value="My Modules"
                            onclick="javascript: MyModulesView();"/>
                          </div>
                      </div>
                      <form method="POST" action="/newModules">
                        <div class="modbuildd">
                          <div class="QMSelectors">
                            <label for="modulename">Module Name: </label>
                            <input type="text" id="moduleName"/>
                          </div>
                          <div class="QMSelectorss">
                            <input type="button" value="Save Module" id="btnModuleEnter"/>
                          </div>
                        </div>
                        <div class="modbuild">
                          <div class="QMSelectors">
                            <p>saved module name here</p>
                          </div>
                        </div>
                      </form>
                    </div>
        <!---MODULE BUILDER ENDS--->
    </div>
    <div class="col-md-6">
      <!---MODULE LIST VIEW START--->
      <form method="POST" name="formModuleList">
        {!! csrf_field() !!}
        <button type="button" name="button" onclick="return showModuleEdit()">Edit</button>
        <button type="submit" name="button" formaction="/moduleDelete">Delete</button>
        <div class="moduleListcontainer" id="moduleListcontainer">
          @foreach($modules as $m)
          <div class="QuizListCell">
              <div class="QuizListCellSelect" id="ModuleListCellName">
                  <input type="radio" name="ModID" value="{{$m->ModuleID}}" id="ModuleListItem" text=""/>
              </div>
              <div class="QuizListCellName" id="ModuleListSelect" name = "{{$m->ModuleID}}">
                  {{$m->ModuleName}}
              </div>
              <div class="QuizListCellActive">
                {{$m->Active}}
              </div>
          </div>
          @endforeach
        </div>
      </form>


        </div>
        <!---MOBILE LIST VIEW END--->
    </div>
  </div>
</div>
