@extends('layout')

@section ('content')


  <!---MENU PANEL START--->
  <div class="row">
    <div class="selectPanel">
        <div class="col-md-3">
            <input type="button" value="Create Modules" id="Modulebuilder"
            onclick="javascript: modulebuilder();"/>
        </div>
        <div class="col-md-3">
            <input type="button" value="Quiz Admin" id="Quizbuilder"
            onclick="javascript: quizbuilder();" />
        </div>
        <div class="col-md-3">
            <input type="button" value="View Quizes" id="QuizView"
            onclick="javascript: quizviewshare();"/>
        </div>
        <div class="col-md-3">
            <input type="button" value="Deploy Quiz" id="QuizDeploy"
            onclick="javascript: quizdeploy();"/>
        </div>
    </div>
  </div>
  <!---MENU PANEL END--->
  <div id="quizadminTABcontainer">
    <div class="row">
      <!---SCREEN LEFT START--->
          <div class="col-md-6">
              <div class="workarea">
                <!---MODULE  SELECT QUIZ CREATE SECTION START--->
                <div class="quizCreateStart" id="quizCreateStart">
                  <h3>Build Quiz Template</h3>
                <div class="QBsections3">
                <!---BUILD NEW QUIZ START--->
                <form method="POST" action="/newQuiz">
                  <div class="QuizBuildStart">
                      <div class="QuizBuildStartCell">
                        <select name='ModuleID'>
                          @foreach($modules as $m)
                            <option value="{{$m->ModuleID}}"> {{$m->ModuleName}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="QuizBuildStartCell">
                        Quiz Name:
                        <input type="text" name="QuizName">
                      </div>
                  </div>
                  <div class="QuizBuildStart">
                      <div class="QuizBuildStartCell">
                          <button type="submit">Save Template</button>
                      </div>
                      <div class="QuizBuildStartCell">
                        <button onclick="return hideNewQuiz()">Cancel</button>
                        {!! csrf_field() !!}
                      </div>
                  </div>
                </form>
              <!---BUILD NEW QUIZ END--->
            </div>
              <!---TEST VIEW PANEL START--->

              <!---TEST VIEW PANEL END--->
        </div>
      </div>
    </div>
      <!---SCREEN LEFT END--->
      <!---SCREEN RIGHT START--->
          <div class="col-md-6">
                <!---Quiz LIST VIEW START--->
                <div class="QuizListcontainer" id="QuizListcontainer">
                    @foreach($quizzes as $q)
                      <div class="QuizListCell">
                        <div class="QuizListCellName_Mod">
                            <div class="QuizListCellSelect">
                                <p>{{$q->ModuleName}}</p>
                            </div>
                            <div class="QuizListCellSelect">
                                <p>{{$q->QuizName}}</p>
                            </div>
                        </div>
                        <div class="QuizListCellControl">

                            <div class="QuizDetail">
                              <div class="QuizEdit">
                                  <h5>Active:</h5>
                              </div>
                              <div class="QuizEditt">
                                  <h5>{{$q->Active}}</h5>
                              </div>
                            </div>

                            <div class="QuizDetail">
                                <div class="QuizEdit">
                                    <a href="/quiz/{{$q->QuizID}}"><h5>Edit</h5></a>
                                </div>
                                <div class="QuizEditt">
                                    <a href="/quiz/{{$q->QuizID}}/delete"><h5>Delete</h5></a>
                                </div>
                            </div>

                        </div>
                      </div>
                    @endforeach
                </div>

                <!---QUIZ LIST VIEW END--->
          </div>
      <!---SCREEN RIGHT END--->
    </div>
  </div>

  <div id="moduleTABcontainer">
    <div class="row">
      <div class="col-md-6">
        <!---MODULE BUILDER START--->
                      <div class="modbuildcontainer">

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

                      </div>
                  <!---MODULE BUILDER ENDS--->
      </div>
      <div class="col-md-6">
        <!---MODULE LIST VIEW START--->
          <div id="ModuleListViewTABcontainer">
            <!---MODULE LIST VIEW START--->
              <div class="moduleListcontainer" id="moduleListcontainer">
                @foreach($modules as $m)
                <div class="ModuleListCell">
                    <div class="ModuleListName" id="ModuleListSelect">
                        <h3>{{$m->ModuleName}}</h3>
                    </div>
                </div>
                @endforeach
              </div>
          </div>
          <!---MOBILE LIST VIEW END--->
      </div>
    </div>
  </div>

  <div id="quizdeployTABcontainer">
    <div class="row">
        <h1>Quiz Deploy Section</h1>
    </div>
  </div>

  <script type="text/javascript">

  function showNewQuiz(){
  divQuizzez.style.display = "none";
  divNewQuiz.style.display = "block";
  return false;
  }

  function hideNewQuiz(){
  divQuizzez.style.display = "block";
  divNewQuiz.style.display = "none";
  return false;
  }
  </script>


  @stop
