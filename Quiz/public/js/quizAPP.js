
var currentPanel = null;

function modulebuilder() {
    if(currentPanel)
        currentPanel.fadeOut(100);
  
          currentPanel = $("#moduleTABcontainer").fadeIn(400);
}

function quizbuilder() {

    if(currentPanel)
        currentPanel.fadeOut(100);
         currentPanel =    $("#quizadminTABcontainer").fadeIn(400);

}

function quizviewshare() {
    if(currentPanel)
        currentPanel.fadeOut(100);

        currentPanel =     $("#quizshareTABcontainer").fadeIn(400);

}

function quizdeploy() {
    if(currentPanel)
        currentPanel.fadeOut(100);

            currentPanel = $("#quizdeployTABcontainer").fadeIn(400);
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
if(currentPanel)
        currentPanel.fadeOut(100);
        $("#quiztemplateViewTABcontainer").fadeIn(400);

}

function MyModulesView(){
 if(currentPanel)
        currentPanel.fadeOut(100); 
        $("#ModuleListViewTABcontainer").fadeIn(400);

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
