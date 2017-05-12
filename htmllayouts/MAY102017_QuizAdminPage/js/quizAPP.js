
function modulebuilder() {
  $(function () {
      $("#Modulebuilder").click(function () {
        $("#quizadminTABcontainer").fadeOut(400);
        $("#quizdeployTABcontainer").fadeOut(400);
        $("#quizshareTABcontainer").fadeOut(400);
        $("#moduleTABcontainer").fadeIn(400);

      });
  });

}

function quizbuilder() {

    $(function () {
        $("#Quizbuilder").click(function () {
          $("#quizdeployTABcontainer").fadeOut(400);
          $("#quizshareTABcontainer").fadeOut(400);
          $("#moduleTABcontainer").fadeOut(400);
          $("#quizadminTABcontainer").fadeIn(400);

        });
    });


}

function quizviewshare() {

    $(function () {
        $("#QuizView").click(function () {
            $("#moduleTABcontainer").fadeOut(400);
            $("#quizadminTABcontainer").fadeOut(400);
            $("#quizdeployTABcontainer").fadeOut(400);
            $("#quizshareTABcontainer").fadeIn(400);

        });

  });

}

function quizdeploy() {

    $(function () {
        $("#QuizDeploy").click(function () {
          $("#moduleTABcontainer").fadeOut(400);
          $("#quizadminTABcontainer").fadeOut(400);
          $("#quizshareTABcontainer").fadeOut(400);
          $("#quizdeployTABcontainer").fadeIn(400);

        });
    });


}




function QnABuilder() {
    $(function () {
        $("#QnA").click(function () {
            $("#TemplateSelectcontainer").fadeOut(400);
              $("#templateViewcontainer").fadeOut(400);
              $("#QuestionbuildContainer").fadeIn(400);
        });
    });

}

function QnASetView() {
    $(function () {
        $("#enterQuestion").click(function () {
            $("#QnASetViewcontainer").fadeIn(400);
            $("#ModuleSelectContainer").fadeOut(400);
        });
    });

}

function openTemplate() {
    $(function () {
        $("#saveQnA").click(function () {
            $("#QuestionbuildContainer").fadeOut(400);
            $("#QnAcreatePanel").fadeOut(400);
            $("#ModuleSelectContainer").fadeOut(400);
            $("#TemplateSelectcontainer").fadeOut(400);
            $("#templateViewcontainer").fadeOut(400);
            $("#templatebuildcontainer").fadeIn(400);
            $("#quizSavecontainer").fadeIn(400);
        });
    });

}

function templateView(){
  $(function(){
    $("#btnTemplateView").click(function(){
        $("#quiztemplateViewTABcontainer").fadeIn(400);
    });
  });

}
function MyModulesView(){
  $(function(){
    $("#MymoduleView").click(function(){
        $("#ModuleListViewTABcontainer").fadeIn(400);
    });
  });

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

// function PostQuestion() {
//
//         var forumPost = {};
//         forumPost.title = $('#txbxTitle').val();
//         forumPost.question = $('#txtAskQuestion').val();
//         var jsonData = JSON.stringify(forumPost);
//
//         $.ajax({
//             url: '/index.aspx?saveForumQuestion',
//             contentType: 'application/json; charset=utf-8',
//             type: 'POST',
//             data: jsonData,
//             success: function (data) {
//                 $('#txbxTitle').val('');
//                 $('txtAskQuestion').val('');
//                 alert("Post Successful");
//             },
//             error: function () {
//                 alert("Something went Wrong");
//             }
//
//
//
//         });
//
//     }
