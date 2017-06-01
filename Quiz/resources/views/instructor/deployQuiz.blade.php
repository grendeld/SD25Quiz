<div id="quizdeployTABcontainer">
    <div class="row">

        <div class="col-md-5">
              <div class="deployQuizCell">
                  <div class="deployQuizItem1">
                    <h3>My intakes:</h3>
                  </div>
                  <div class="deployQuizItem2">
                      <select class="deployTest" name="" id="selectIntake">
                        <option selected disabled>---Intake---</option>
                        @foreach($intakes as $i)
                        <option value="{{$i->IntakeID}}" onclick="javascript: getQuizzesAndStudents();">{{$i->IntakeName}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
        </div>
        <div class="col-md-7">
              <div class="deployQuizCelll">
                <form name = "formDeployTest">
                          <h3>Quizzes:</h3>
                      <div class="deployQuizItem">
                          <div class="deployTest" id="divQuizForTest">

                          </div>
                      </div>

                          <h3>Students:</h3>
                      <div class="deployQuizItem">
                        <div class="deployTest" id="divStudentsForTest" >

                        </div>
                      </div>
                      <br/>
                      <div class="deployQuizItem">
                          <button type="button" onclick='javascript: StartTest();'
                          id="btnStart">Start test</button>
                      </div>
                </form>
              </div>
        </div>
          <div class="col-md-2"></div>
    </div>
</div>
