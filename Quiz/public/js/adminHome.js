function divProgramShow(programJSONstring)
{
program = JSON.parse(programJSONstring);
//alert(instructor.FirstName);
  divProgram.style.display = "block";

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
//alert(instructor.FirstName);
  divInstructor.style.display = "block";

h3instructorName.innerHTML = instructor.FirstName + ' ' + instructor.LastName;

  list= document.getElementById('IntakesList');
  list.innerHTML = '';
  for (var i=0; i<instructor.intakes.length; i++)
  {
    list.innerHTML += ('<li>' + instructor.intakes[i].IntakeName + '</li>');
  }

instr = instructor;
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


function showAddIntake()
{
divSelectIntake.style.display = "block";
}

function AddIntake(intakeJSONstring)
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
            //window.location.reload();
          }
        });
      //  window.location.reload();
  }}
] // buttons
});
}



function RemoveIntake(intakeJSONstring)
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
            //window.location.reload();
          }
        });
      //  window.location.reload();
  }}
] // buttons
});
}
