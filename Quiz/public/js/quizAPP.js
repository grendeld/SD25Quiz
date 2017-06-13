
var currentPanel = null;
var currentView = null;

function modulebuilder() {
    if(currentPanel)
        currentPanel.fadeOut(100);
          currentPanel = $("#moduleTABcontainer").fadeIn(400);

        if(currentView)
          currentView.fadeOut(100);
}

function quizbuilder() {

    if(currentPanel)
        currentPanel.fadeOut(100);
         currentPanel =    $("#quizadminTABcontainer").fadeIn(400);

    if(currentView)
       currentView.fadeOut(100);


}

function quizviewshare() {
    if(currentPanel)
        currentPanel.fadeOut(100);
        currentPanel =     $("#quizshareTABcontainer").fadeIn(400);

        if(currentView)
          currentView.fadeOut(100);


}

function quizdeploy() {
    if(currentPanel)
        currentPanel.fadeOut(100);

            currentPanel = $("#quizdeployTABcontainer").fadeIn(400);

            if(currentView)
              currentView.fadeOut(100);

}




function QnABuilder() {

            $("#TemplateSelectcontainer").fadeOut(400);
              $("#templateViewcontainer").fadeOut(400);
            $("#QuestionbuildContainer").fadeIn(400);

}

function QnASetView() {

            $("#QuestionListViewTABcontainer").fadeIn(400);

}

function openTemplate() {
    $(function () {
        $("#saveQnA").click(function () {
            $("#QuestionbuildContainer").fadeOut(400);
            $("#QnAcreatePanel").fadeOut(400);
            $("#quizCreateStart").fadeOut(400);
            $("#createQuizButton").fadeOut(400);
            $("#templatebuildcontainer").fadeIn(400);
            $("#quizSavecontainer").fadeIn(400);
        });
    });

}

function templateView(){
//if(currentPanel)
        //currentPanel.fadeOut(100);
        if(currentView)
          currentView.fadeOut(100);
        currentView = $("#TemplateListViewTABcontainer").fadeIn(400);
}

function MyModulesView(){
 //if(currentPanel)
        //currentPanel.fadeOut(100);
        if(currentView)
          currentView.fadeOut(100);
        currentView = $("#ModuleListViewTABcontainer").fadeIn(400);


}



function ViewMyQuizes(){
  $(function(){
    $("#ListMyQuizes").click(function(){
      $("#moduleTABcontainer").fadeOut(400);
      $("#quizadminTABcontainer").fadeOut(400);
      $("#QuizListViewTABcontainer").fadeIn(400);
    });
  });

}

function PublicQuizListView(){
  $(function(){
      $("#ViewPublicQuizes").click(function(){
          $("#MySelectedQuiz").fadeOut(400);
          $("#SelectedPublicQuiz").fadeIn(400);
      });
  });
}


function getQuizzesAndStudents(){
  var ddl = document.getElementById("selectIntake");
  var intake = ddl.options[ddl.selectedIndex].value;
  //var doc = document.getElementById("divStudents");
$("#divStudentsForTest").empty();
$("#divQuizForTest").empty();


$.ajax({
url:'/getQuizList',
type:'get',
data:{'IntakeID':intake},
success:function(data){
  $.each(data,function(i,item){
    $("#divQuizForTest").append("<input type='radio' name='SelectedQuiz' onclick = 'StudentChecked()' value='" + item.QuizID + "'/> "+ item.QuizName + "<br/>");
 });
}
});


    $.ajax({
    url:'/getStudents',
    type:'get',
    data:{'IntakeID':intake},
    success:function(data){
      $.each(data,function(i,item){
        $("#divStudentsForTest").append("<br/><input type='checkbox' name='CheckedStudent' onclick = 'StudentChecked()' value = '"+item.StudentID+"'/> " + item.FirstName +" "+ item.LastName +"<br/>");
      });
    }
  });
}


function StudentChecked()
{
  var checkboxes = document.getElementsByName('CheckedStudent');
  CheckedStudentsID = [];

for (var i = 0; i<checkboxes.length; i++)
{
  if (checkboxes[i].checked)
  CheckedStudentsID.push(checkboxes[i]);
  }

  var radio = document.getElementsByName("SelectedQuiz");
  SelectedQuizID =-1;
  for (var i=0; i<radio.length; i++)
  {
    if (radio[i].checked){
      SelectedQuizID = radio[i].value;
      break;
    }
  }
ShowStartButton();
}

function ShowStartButton()
{
  if (CheckedStudentsID.length>0 && SelectedQuizID>-1)
  btnStart.style.display = "block";
  else
  btnStart.style.display = "none";
}



function StartTest()
{

for (var i=0; i<CheckedStudentsID.length; i++)
{
  $.ajax({
  url:'/startTest',
  type:'get',
  data:{'QuizID':SelectedQuizID, 'StudentID':CheckedStudentsID[i].value},
  success:function(data){
     alert(data);
     window.location.href = "test/Instructor/" + SelectedQuizID;
  }
});

}





}
