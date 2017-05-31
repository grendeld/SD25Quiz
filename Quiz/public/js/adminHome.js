
// function clear()
// {
//   divProgram.style.display = "none";
//   divInstructor.style.display = "none";
//   divIntakes.style.display = "none";
//   divEditIntructorIntake.style.display = "none";
//   divOneIntake.style.display = "none";
//   divNewIntake.style.display = "none";
//
// }
var currentPanel = null;

function showProgramsPanel()
{
  if(currentPanel)
      currentPanel.fadeOut(100);
        currentPanel = $("#ProgramsPanel").fadeIn(10);
}

function showInstructorsPanel()
{
  if(currentPanel)
      currentPanel.fadeOut(100);
        currentPanel = $("#InstructorsPanel").fadeIn(10);
}

function showIntakesPanel()
{
  if(currentPanel)
      currentPanel.fadeOut(100);
        currentPanel = $("#IntakesPanel").fadeIn(10);
}


function divProgramShow(programJSONstring)
{
  program = JSON.parse(programJSONstring);

  //clear();
  divProgram.style.display = "block";
  //selectInstructor.selectedIndex = "0";

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
instructor = JSON.parse(instructorJSONstring);
//clear();
  divInstructor.style.display = "block";
  selectProgram.selectedIndex = "0";

h3instructorName.innerHTML = instructor.FirstName + ' ' + instructor.LastName;

  list= document.getElementById('IntakesList');
  list.innerHTML = '';
  for (var i=0; i<instructor.intakes.length; i++)
  {
    list.innerHTML += ('<li>' + instructor.intakes[i].IntakeName + '</li>');
  }

instr = instructor;
}

function divIntakeShow(intake)
{
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

function AddInstructorIntake(intakeJSONstring)
{
  intake = JSON.parse(intakeJSONstring);
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



function RemoveInstructorIntake(intakeJSONstring)
{
  intake = JSON.parse(intakeJSONstring);
 $('#dialog').html("Remove intake " + intake.IntakeName + " from instructor " + instr.FirstName + " " + instr.LastName + "?");
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
          data:{'InstructorID':instr.InstructorID, 'IntakeID':intake.IntakeID},
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


// function showDivIntakes()
// {
//   clear();
//   selectProgram.selectedIndex = "0";
//   selectInstructor.selectedIndex = "0";
//
// $("#divIntakes").slideToggle(100);
// document.getElementById("selectProgramID").selectedIndex = "0";
// }

// function divIntakeShow(intake)
// {
// $("#divIntake").slideDown(100);
//   list=document.getElementById("StudentsList");
//   list.innerHTML="";
//   for (var i=0; i<intake.students.length; i++)
//   {
//     list.innerHTML += ('<li>' + intake.students[i].FirstName + " " + intake.students[i].LastName + '</li>');
//   }
// }

function Add_new_intake()
{
$("#divIntakes").slideToggle(100);
$("#divNewIntake").slideToggle(100);
}

// function validateNewIntake()
// {
//   alert("false");
//   IntakeName=document.getElementById('txtIntakeName');
//   ProgramID=document.getElementById('selectProgramID');
//
//   if (IntakeName.value == "")
//   {
//     alert("false");
//   }
//   return false;
// }
