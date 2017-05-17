function divInstructorShow(instructor)
{
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

function showAddIntake()
{
divSelectIntake.style.display = "block";
}

function selectNewIntake(intake)
{
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
            //$( "#divInstructor" ).load( "/adminHome #divInstructor" );
            //instr.intakes.push(data);
            if(data[0]== true){
              divInstructorShow(data[1]);
            }
            else {
              alert('sorry');
            }
            //window.location.reload();
          }
        });
      //  window.location.reload();
  }}
] // buttons
});
}
