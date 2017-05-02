
function modulebuilder() {
  $(function () {
      $("#Modulebuilder").click(function () {
          $("#moduleTABcontainer").fadeIn(400);

      });
  });

}

function quizbuilder() {

    $(function () {
        $("#Quizbuilder").click(function () {
            $("#quizadminTABcontainer").fadeIn(400);

        });
    });


}

function quizviewshare() {

    $(function () {
        $("#QuizView").click(function () {
            $("#quizshareTABcontainer").fadeIn(400);

        });

  });

}

function quizdeploy() {

    $(function () {
        $("#QuizDeploy").click(function () {
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
            $("#QuestionListViewTABcontainer").fadeIn(400);
        });
    });

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
