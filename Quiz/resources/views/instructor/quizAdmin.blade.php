@extends('layout')

@section ('content')


<div id="quizadminTABcontainer" style="display:block">
  <!---TEMPLATE SELECT START--->
  <div class="TemplateSelectcontainer" id="TemplateSelectcontainer">

      <div class="QBsections3" id="templateSelector">
        <h4>Quiz Creator</h4>
      </div>
  </div>
  <!---TEMPLATE SELECT ENDS--->

  <!---QUIZ BUILDER CONTAINER START--->
    <div class="quizbuildcontainer" id="quizbuildcontainer">
      <!---MODULE  SELECT QUIZ CREATE SECTION START--->
      <div class="quizCreateStart" id="quizCreateStart">


          <form action="/saveTemplate" method="post">
                <div class="QBsections1">
                  <h4>Build Template</h4>
                      <div class="QBSelectors">
                        <select class="quizbuttonn" id="QModuleSelect" name="ModuleID" required>
                          <option value=" " disabled >--Select Module--</option>
                          @foreach($modules as $m)
                          <option value="{{$m->ModuleID}}">{{$m->ModuleName}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="QBSelectors">
                        <label for="testname">Quiz Name: </label>
                        <input type="text" id="testName" name="QuizName" required/>
                      </div>
                </div>
              </div>
                <!---MODULE  SELECT QUIZ CREATE SECTION END--->
                <!---CREATE QUIZ TEMPLATE BUTTON START--->
                <div class="QBsections1" id="createQuizButton">
                      <div class="QBSelectorss">
                        <input type="submit" class="quizbutton" value="Create Quiz Template"/>
                      </div>
                </div>
                <!---CREATE QUIZ TEMPLATE BUTTON END--->
          {!! csrf_field() !!}
          </form>

      <div class="QBsections2" id="QnAcreatePanel">
          <div class="QBSelectorss">
              <input type="button" class="quizbutton" value="Create Q & A" id="QnA"
              onclick="javascript: QnABuilder();"/>
          </div>
      </div>

      <!-- -SAVE QUIZ START--->
      <div class="quizSavecontainer" id="quizSavecontainer">
          <div class="QBsections1" id="SaveQuizz">
                <div class="QBSelectorss">
                  <input type="button" class="quizbutton" value="Save Quiz"/>
                </div>
          </div>
      </div>
      <!---SAVE QUIZ END- -->
    </div>
    <!---QUIZ BUILDER CONTAINER END--->

    <!----TEMPLATE EDIT START ?????---->
    <div class="templatebuildcontainer" id="templatebuildcontainer">
    </div>
    <!---TEMPLATE EDIT END--->


</div>

@stop
