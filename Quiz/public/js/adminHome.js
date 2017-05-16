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

}

function showAddIntake()
{
divSelectIntake.style.display = "block";
}
