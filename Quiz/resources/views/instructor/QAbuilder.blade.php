  <div class="QuestionbuildContainer" id="QuestionbuildContainer">
    <h3>Create Question Set</h3>
    <!---QUESTIONSET SECTION START--->
    <form class="" action="index.html" method="post">
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
