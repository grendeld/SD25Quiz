<div id="quizadminTABcontainer">
  <!---TEMPLATE SELECT START--->
  <div class="TemplateSelectcontainer" id="TemplateSelectcontainer">
      <h3>Template Select</h3>
      <div class="QBsections2" id="templateSelector">
          <input type="button" id="btnTemplateView" value="My Templates"
          onclick="javascript: templateView();"/>
      </div>
  </div>
  <!---TEMPLATE SELECT ENDS--->

  <!---QUIZ BUILDER CONTAINER START--->
    <div class="quizbuildcontainer" id="quizbuildcontainer">
      <!---MODULE  SELECT QUIZ CREATE SECTION START--->
      <div class="quizCreateStart" id="quizCreateStart">
        <h3>Build Template</h3>

<form action="/saveTemplate" method="post">
      <div class="QBsections1">
            <div class="QBSelectors">
              <select id="QModuleSelect" name="ModuleID">
                <option value=" ">--Select Module--</option>
                @foreach($modules as $m)
                <option value="{{$m->ModuleID}}">{{$m->ModuleName}}</option>
                @endforeach
              </select>
            </div>

            <div class="QBSelectors">
              <label for="testname">Quiz Name: </label>
              <input type="text" id="testName" name="QuizName"/>
            </div>
      </div>
    </div>
      <!---MODULE  SELECT QUIZ CREATE SECTION END--->
      <!---CREATE QUIZ TEMPLATE BUTTON START--->
      <div class="QBsections1" id="createQuizButton">
            <div class="QBSelectorss">
              <input type="submit" value="Create Quiz Template"/>
            </div>
      </div>
      <!---CREATE QUIZ TEMPLATE BUTTON END--->
{!! csrf_field() !!}
</form>

      <div class="QBsections2" id="QnAcreatePanel">
          <div class="QBSelectorss">
              <input type="button" value="Create Q & A" id="QnA"
              onclick="javascript: QnABuilder();"/>
          </div>
      </div>

      <!-- -SAVE QUIZ START--->
      <div class="quizSavecontainer" id="quizSavecontainer">
          <div class="QBsections1" id="SaveQuizz">
                <div class="QBSelectorss">
                  <input type="button" value="Save Quiz"/>
                </div>
          </div>
      </div>
      <!---SAVE QUIZ END- -->
    </div>
    <!---QUIZ BUILDER CONTAINER END--->

    <!----TEMPLATE EDIT START ?????---->
    <div class="templatebuildcontainer" id="templatebuildcontainer">
        <div class="QBsections2 template">
          <div class="QBSelectorss">
              <h3 style="text-align: center;">TEMPLATE NAME HERE</h3>
          </div>
        </div>
        <div class="QBsections4 questionSetup">
            <div class="QBSegment">
              <h4>Selected Question Here</h4>
              <ul>
                  <li>Matching Answer#1</li>
                  <li>Matching Answer#2</li>
                  <li>Matching Answer#3</li>
                  <li>Matching Answer#4</li>
              </ul>
              <p>Correct Answer</p>
              <input type="button" value="Remove" id="QuestionRemove"/>
              <input type="button" value="Replace" id="QuestionReplace"/>
            </div>
        </div>
    </div>
    <!---TEMPLATE EDIT END--->

    <!----QUESTIONANSWER BUILDER START---->
    @include('instructor.QAbuilder')
    <!------QUESTIONANSWER BUILDER END---->
</div>
