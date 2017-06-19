
// var currentPanel = null;
// var currentDiv = null;
//
// function showProgramsPanel()
// {
//   if(currentDiv)
//   currentDiv.fadeOut(100);
//
//   if(currentPanel)
//       currentPanel.fadeOut(100);
//         currentPanel = $("#ProgramsPanel").fadeIn(10);
// }
//
// function showInstructorsPanel()
// {
//   if(currentDiv)
//   currentDiv.fadeOut(100);
//
//   if(currentPanel)
//       currentPanel.fadeOut(100);
//         currentPanel = $("#InstructorsPanel").fadeIn(10);
// }
//
// function showIntakesPanel()
// {
//   if(currentDiv)
//   currentDiv.fadeOut(100);
//
//   if(currentPanel)
//       currentPanel.fadeOut(100);
//         currentPanel = $("#IntakesPanel").fadeIn(10);
// }
//
// function showStudentsPanel()
// {
//   if(currentDiv)
//   currentDiv.fadeOut(100);
//
//   if(currentPanel)
//       currentPanel.fadeOut(100);
//         currentPanel = $("#StudentsPanel").fadeIn(10);
// }


function divProgramShow(programJSONstring)
{
  if(currentDiv)
      currentDiv.fadeOut(100);
        currentDiv = $("#divProgram").fadeIn(10);

  program = JSON.parse(programJSONstring);


  h3ProgramName.innerHTML = program.ProgramName ;
  list= document.getElementById('ModulesList');
  list.innerHTML = '';
  for (var i=0; i<program.modules.length; i++)
  {
    list.innerHTML += ('<li>' + program.modules[i].ModuleName + '</li>');
  }
  prog = program;
}

function divInstructorShow(instructorJSONstring)
{

  if(currentDiv)
      currentDiv.fadeOut(100);
        currentDiv = $("#divInstructor").fadeIn(10);

 instructor = JSON.parse(instructorJSONstring);

  h3instructorName.innerHTML = instructor.FirstName + ' ' + instructor.LastName;

  list= document.getElementById('IntakesList');
  list.innerHTML = '';
  for (var i=0; i<instructor.intakes.length; i++)
  {
    //list.innerHTML += ('<li>' + instructor.intakes[i].IntakeName + '</li>');
    list.innerHTML += ('<input type="radio" name="Intake_to_remove" value = "' + instructor.intakes[i].IntakeID + '" text = "'+ instructor.intakes[i].IntakeName +' ">' + instructor.intakes[i].IntakeName + '</> <br/>');

  }

  instr = instructor;
}

function divIntakeShow(intake)
{
  if(currentDiv)
      currentDiv.fadeOut(100);
        currentDiv = $("#divIntake").fadeIn(10);

  intake = JSON.parse(intake);
  //$("#divIntake").slideDown(100);
  h3IntakeName.innerHTML = intake.IntakeName ;
  list=document.getElementById("StudentsList");
  list.innerHTML="";
  for (var i=0; i<intake.students.length; i++)
  {
    list.innerHTML += ('<li>' + intake.students[i].FirstName + " " + intake.students[i].LastName + '</li>');
  }
}

function Add_new_intake()
{
  if(currentDiv)
      currentDiv.fadeOut(100);
        currentDiv = $("#divNewIntake").fadeIn(10);
}

function hideDivNewIntake()
{
$("#divNewIntake").fadeOut(10);
}

function SearchStudent()
{
$('#divSearchResult').empty();
  if(!txtSearchStudent.value.match(/\S/))
  {
    return false;
  }

  $.ajax({
    url:'/student',
    type:'get',
    data:{'q':txtSearchStudent.value},
    success:function(data){
      if(data.length>0)
      {
        $.each(data,function(i,student){
          var p = document.createElement("p");
          p.setAttribute('class','SearchResultString');
          p.onclick = function(object){
            return function(){
              divStudentShow(object);
            }
          }(student);
          p.innerHTML = student.FirstName + " " + student.LastName;
          $('#divSearchResult').append(p);
        });
      }
      else
      {
        $('#divSearchResult').append('No results');
      }
    }
  });

}

function divStudentShow(student)
{
  if(currentDiv)
      currentDiv.fadeOut(100);
        currentDiv = $("#divStudent").fadeIn(10);
        divEmail.innerHTML = student.email;
   h3StudentName.innerHTML = student.FirstName + ' ' + student.LastName;
   imgStudent.src = 'storage/' + student.Photo;

   stud = student;
}

function EditProgram(){
window.location.replace('/program/' + prog.ProgramID);
Session["Program"] = prog;
}

function DeleteProgram(){
  dialog.setAttribute("title","Delete Program");

if (prog.modules.length>0){
  dialog.innerHTML = "Cannot delete program with modules. Disactivate program " + prog.ProgramName + "?";
  $( "#dialog" ).dialog({
   modal:true,
   buttons: [
     { text: "No",
       click: function() {
         $( this ).dialog( "close" );
       }},

       { text:"Yes",
     click:function(){
       $( this ).dialog( "close" );
       window.location.replace('program/' + prog.ProgramID + '/delete');
     }}
   ] // buttons
   });
  }
  else{
    dialog.innerHTML = "Delete program " + prog.ProgramName + "?";
    $( "#dialog" ).dialog({
     modal:true,
     buttons: [
       { text: "No",
         click: function() {
           $( this ).dialog( "close" );
         }},
         { text:"Yes",
       click:function(){
         $( this ).dialog( "close" );
         window.location.replace('program/' + prog.ProgramID + '/delete');
       }}
     ] // buttons
     });
  }
}

function DeleteInstructor(){
  dialog.setAttribute("title","Delete Instructor");
  dialog.innerHTML = "Cannot delete instructor with intakes.";

  if (instr.intakes.length > 0)
  {
    $( "#dialog" ).dialog({
     modal:true,
     buttons: [
       { text: "Cancel",
         click: function() {
           $( this ).dialog( "close" );
         }},
     ] // buttons
     });

  }
  else{
  dialog.innerHTML = "Delete instructor " + instr.FirstName + " " + instr.LastName + "?";

  $( "#dialog" ).dialog({
   modal:true,
   buttons: [
     { text: "Cancel",
       click: function() {
         $( this ).dialog( "close" );
       }},

       { text:"OK",
     click:function(){
       $( this ).dialog( "close" );
       window.location.replace('/instructor/' + instr.InstructorID + '/delete');
     }}
   ] // buttons
   });
}
}

function EditInstructor(){
window.location.replace('/instructor/' + instr.InstructorID);
}





function showdivEditIntructorIntake()
{
divEditIntructorIntake.style.display = "block";
}

function AddInstructorIntake(intake)
{
  intake = JSON.parse(intake);
 $('#dialog').html("Add intake " + intake.IntakeName + " to instructor " + instr.FirstName + " " + instr.LastName + "?");
 $( "#dialog" ).dialog({
  modal:true,
  buttons: [
    { text: "Cancel",
      click: function() {
        $( this ).dialog( "close" );
      }},
    { text:"OK",
  click:function(){
    $( this ).dialog( "close" );
        $.ajax({
          url:'/InstrIntAdd',
          type:'get',
          data:{'InstructorID':instr.InstructorID, 'IntakeID':intake.IntakeID},
          success:function(data){
            if(data[0] == true){
              divInstructorShow(JSON.stringify(data[1]));
            }
            else {
              alert('Instructor already has this intake.');
            }
          }
        });
  }}
] // buttons
});
}


function RemoveInstructorIntake()
{
  //intake = JSON.parse(intakeJSONstring);

  var radios = document.getElementsByName('Intake_to_remove');

  for (var i = 0, length = radios.length; i < length; i++) {
      if (radios[i].checked) {
          // do whatever you want with the checked radio
          var intakename = radios[i].getAttribute("text");
          //alert(intakename);
          var intake = radios[i].value;
          // only one radio can be logically checked, don't check the rest
          break;
      }
  }





  //intake = $('input[name="Intake_to_remove"]:checked').val();

  //intakename = $('input[name="Intake_to_remove"]:checked').intakename();

 $('#dialog').html("Remove intake " + intakename + " from instructor " + instr.FirstName + " " + instr.LastName + "?");
 $( "#dialog" ).dialog({
  modal:true,
  buttons: [
    { text: "Cancel",
      click: function() {
        $( this ).dialog( "close" );
      }},
    { text:"OK",
  click:function(){
    $( this ).dialog( "close" );
        $.ajax({
          url:'/InstrIntRemove',
          type:'get',
          data:{'InstructorID':instr.InstructorID, 'IntakeID':intake},
          success:function(data){
            if(data[0] == true){
              divInstructorShow(JSON.stringify(data[1]));
            }
            else {
              alert("The instructor doesn't have such intake" );
            }
          }
        });
  }}
] // buttons
});
}

function EditStudent(){
window.location.replace('/student/' + stud.StudentID);
}

function DeleteStudent()
{
$('#dialog').html("Delete Student " + stud.FirstName + " " + stud.LastName + "?");
$( "#dialog" ).dialog({
        modal:true,
        buttons: [{text: "No",   click: function() { $( this ).dialog( "close" );}  },
                  { text: "Yes",  click: function() {
                    $.ajaxSetup({
                      headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
                                });

                                $.ajax({
                                  type:   'POST',
                                  url:    '/student/',
                                  data:   { _method: 'delete', StudentID: stud.StudentID},
                                  success: function(data){
                                    alert('deleted');
                                    location.reload();
                                    }
                                    });
                                                      }
                  }],//button "Yes"
});//dialog

}
