<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Quiz Builder</title>
  	<link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/quizeditViewerPanel.css">
    <link rel="stylesheet" href="css/ModuleBuilder.css">
  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/bootstrap.css">
  	<link rel="stylesheet" href="css/bootstrap-grid.css">
  	<link rel="stylesheet" href="css/bootstrap-grid.min.css">

	<script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/quizAPP.js"></script>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container-fluid">
    <!---INSTRUCTOR HOME PAGE START--->
        <div class="row">
          <div class="banner">
            top banner display logged in username, program-name and date<br/>
            TEST SESSION PAGE and LOG OUT PAGE - link buttons will be here
          </div>
        </div>
        <!---MENU PANEL START--->
        <div class="row">
          <div class="selectPanel">
              <div class="col-md-3">
                <input type="button" value="Create Modules" id="Modulebuilder"
                onclick="javascript: modulebuilder();"/>
              </div>
              <div class="col-md-3">
                  <input type="button" value="Create Quiz" id="Quizbuilder"
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
        <!---INSTRUCTOR HOME PAGE START--->
        <div class="row">
            <!---WORK AREA START--->
            <div class="col-md-6">
              <div class="workarea">
                  <!---MODULE TAB START--->
                  <div id="moduleTABcontainer">
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
                  <!---MODULE TAB END--->
                  <!---QUIZ ADMIN START--->
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
                        <div class="QBsections1">
                              <div class="QBSelectors">
                                <select id="QModuleSelect">
                                  <option value=" ">--Select Module--</option>
                                  <option value="1">Module 1</option>
                                  <option value="2">Module 2</option>
                                  <option value="3">Module 3</option>
                                  <option value="4">Module 4</option>
                                </select>
                              </div>

                              <div class="QBSelectors">
                                <label for="testname">Quiz Name: </label>
                                <input type="text" id="testName"/>
                              </div>
                        </div>
                      </div>
                        <!---MODULE  SELECT QUIZ CREATE SECTION END--->
                        <!---CREATE QUIZ TEMPLATE BUTTON START--->
                        <div class="QBsections1" id="createQuizButton">
                              <div class="QBSelectorss">
                                <input type="button" value="Create Quiz Template"/>
                              </div>
                        </div>
                        <!---CREATE QUIZ TEMPLATE BUTTON END--->
                        <!---CREATE Q&A START---->
                        <div class="QBsections2" id="QnAcreatePanel">
                            <div class="QBSelectorss">
                                <input type="button" value="Create Q & A" id="QnA"
                                onclick="javascript: QnABuilder();"/>
                            </div>
                        </div>
                        <!---CREATE Q&A END---->
                        <!---SAVE QUIZ START--->
                        <div class="quizSavecontainer" id="quizSavecontainer">
                            <div class="QBsections1" id="SaveQuizz">
                                  <div class="QBSelectorss">
                                    <input type="button" value="Save Quiz"/>
                                  </div>
                            </div>
                        </div>
                        <!---SAVE QUIZ END--->
                      </div>
                      <!---QUIZ BUILDER CONTAINER END--->
                      <!----TEMPLATE EDIT START---->
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
                        <div class="QuestionbuildContainer" id="QuestionbuildContainer">
                          <h3>Create Question Set</h3>
                          <!---QUESTIONSET SECTION START--->
                          <div class="Question">
                            <p>Enter Your Question Below</p>
                            <textarea cols="50" row="5" placeholder="Question"></textarea>
                          </div>
                          <!---QUESTIONSET SECTION END--->
                          <!---ANSWERSET SECTION START--->
                          <div class="Answer">
                            <div class="AnswerNumber"><h3>A</h3></div>
                            <div class="AnswerTextInput">
                              <input type="text" placeholder="Option A" id="A"/>
                            </div>
                          </div>
                          <div class="Answer">
                            <div class="AnswerNumber"><h3>B</h3></div>
                            <div class="AnswerTextInput">
                              <input type="text" placeholder="Option B" id="B"/>
                            </div>
                          </div>
                          <div class="Answer">
                            <div class="AnswerNumber"><h3>C</h3></div>
                            <div class="AnswerTextInput">
                              <input type="text" placeholder="Option C" id="C"/>
                            </div>
                          </div>
                          <div class="Answer">
                            <div class="AnswerNumber"><h3>D</h3></div>
                            <div class="AnswerTextInput">
                              <input type="text" placeholder="Option D" id="D"/>
                            </div>
                          </div>
                          <div class="Answer">
                            <div class="AnswerNumber"><h3>E</h3></div>
                            <div class="AnswerTextInput">
                              <input type="text" placeholder="Option E" id="E"/>
                            </div>
                          </div>
                          <div class="Answer">
                            <div class="AnswerNumber"><h3>F</h3></div>
                            <div class="AnswerTextInput">
                              <input type="text" placeholder="Option F" id="F"/>
                            </div>
                          </div>
                          <!---ANSWERSET SECTION END--->
                          <!---CORRECTANSWERSET SECTION START--->
                          <div class="AnswerSet">
                            <div class="AnswerNumber"><p>Enter Correct Answer Option Here</p></div>
                            <div class="AnswerTextInput">
                              <input type="text" placeholder="correct answer" style="width:150px; margin-right:20px;" id="correctAnswer"/>
                            </div>
                              <input type="Button" value="Next Q&A" id="enterQuestion"
                              onclick="javascript: QnASetView();"/>
                          </div>

                          <!---CORRECTANSWERSET SECTION END--->
                        </div>

                      <!------QUESTIONANSWER BUILDER END---->
                  </div>
                  <!---QUIZ ADMIN END--->
                  <!---QUIZ VIEW SHARE START--->
                  <div id="quizshareTABcontainer">

                  </div>
                  <!---QUIZ VIEW SHARE END--->
                  <!---QUIZ DEPLOY START--->
                  <div id="quizdeployTABcontainer">

                  </div>
                  <!---QUIZ DEPLOY END--->
              </div>
            </div>
            <!---WORK AREA END--->
            <!---WORK VIEW START--->
            <div class="col-md-6">
              <div class="workview">
                  <!---MODULE LIST VIEW START--->
                  <div id="ModuleListViewTABcontainer">
                    <!---MODULE LIST VIEW START--->
                      <div class="moduleListcontainer" id="moduleListcontainer">
                        <div class="QuizListCell">
                            <div class="QuizListCellSelect" id="ModuleListCellName">
                                <input type="checkbox" id="ModuleListItem" />
                            </div>
                            <div class="QuizListCellName" id="ModuleListSelect">
                                <h3>Module Name</h3>
                            </div>
                        </div>
                      </div>
                  </div>
                  <!---MOBILE LIST VIEW END--->
                </div>
                <!---MODULE LIST VIEW END--->

                  <!---QUESTIONLIST VIEW START--->
                  <div id="QuestionListViewTABcontainer">
                    <!---QUESTIONS VIEWER SELECT START--->
                    <div class="QnASetViewcontainer" id="QnASetViewcontainer">
                      <h3 style="margin-bottom:20px;">Created Questions</h3>
                        <div class="QnAsave">
                            <input type="Button" value="Save Q&A Set" id="saveQnA"
                            onclick="javascript: openTemplate();"/>
                        </div>
                        <div class="QnASet">

                          <div class="QuestionListView" id="QListView">
                              <ul>
                                  <li>
                                      <div class="QListSegment">
                                          <div class="QlistchkbxSelect">
                                            <input type="checkbox" id="chkbxQSelect"/>
                                          </div>
                                          <div class="QListQuestion">
                                            <p>Indivudual Question ...</p>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>

                        </div>
                    </div>
                    <!---QUESTIONS VIEWER SELECT END--->
                  </div>
                  <!---QUESTIONLIST VIEW END--->
                  <!---TEMPLATE LIST VIEW START--->
                  <div id="TemplateListViewTABcontainer">

                  </div>
                  <!---TEMPLATE LIST VIEW END--->
                  <!---QUIZ LIST VIEW START--->
                  <div id="QuizListViewTABcontainer">

                  </div>
                  <!---QUIZ LIST VIEW END--->
                  <!---STUDENT LIST VIEW START---->
                  <div id="StudentListViewTABcontainer">

                  </div>
                  <!---STUDENT LIST VIEW END--->
              </div>
            </div>
            <!---WORK VIEW END--->

        </div>
  <!---INSTRUCTOR HOME PAGE END--->
</div>
  </body>
  </html>
