<div id="moduleTABcontainer">
    <div class="col-md-6">
      <!---MODULE BUILDER START--->
          <div class="modbuildcontainer">
              <div class="modbuild">
                <div class="QMSelectors">
                  <input type="button" id="MymoduleView" value="My Modules"
                  onclick="javascript: MyModulesView();"/>
                </div>
              </div>
              <div class="modbuildd">
                <div class="QMSelectors">
                  <form method="POST" action="/newModule">
                    <label for="ProgramID">Program:</label>
                  <select name='ProgramID'>
                    @foreach($programs as $p)
                      <option value="{{$p->ProgramID}}"> {{$p->ProgramName}}</option>
                    @endforeach
                  </select>
                  <label for="modulename">Module Name: </label>
                  <input type="text" name="ModuleName" id="moduleName"/>
                </div>
                <div class="QMSelectorss">
                  <input type="submit"  value="Add Module" id="btnModuleEnter"/>
                </div>
                {!! csrf_field() !!}
              </form>
              </div>
              <div class="modbuild">
                <div class="QMSelectors">
                  <p>saved module name here</p>
                </div>
              </div>

          </div>
      <!---MODULE BUILDER ENDS--->
    </div>

    <div class="col-md-6">
      <!---MODULE LIST START--->
      @include('instructor.moduleList')
      <!---MODULE LIST END--->
    </div>
</div>
