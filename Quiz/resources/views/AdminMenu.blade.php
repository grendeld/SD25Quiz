
<script type="text/javascript" src="js/adminHome.js"></script>


<!---ADMIN HOME MENU START--->
<div class="row">
  <div class="selectPanel">
      <div class="col-md-3 TopMenuInstructor">
              <button class="InstructMenu"
              onclick="javascript: showProgramsPanel()">
                  <span>
                    <font face="marzo-w00-regular, fantasy" style="color:black;">
                        <h4><strong>Programs</strong></h4>
                    </font>
                  </span>
              </button>
      </div>
      <!--<div class="col-md-3">
        <input type="button" value="Programs"
        onclick="javascript: showProgramsPanel()"/>
      </div>-->
      <div class="col-md-3 TopMenuInstructor">
              <button class="InstructMenu"
              onclick="javascript: showInstructorsPanel()">
                  <span>
                    <font face="marzo-w00-regular, fantasy" style="color:black;"><strong>

                        <h4><strong>Instructors</strong></h4>
                  </strong></font>
                  </span>
              </button>
      </div>
      <!---<div class="col-md-3">
          <input type="button" value="Instructors"
          onclick="javascript: showInstructorsPanel()" />
      </div>--->
      <div class="col-md-3 TopMenuInstructor">
              <button class="InstructMenu"
              onclick="javascript: showIntakesPanel()">
                  <span>
                    <font face="marzo-w00-regular, fantasy" style="color:black;">

                        <h4><strong>Intakes</strong></h4>
                  </font>
                  </span>
              </button>
      </div>
      <!---<div class="col-md-3">
          <input type="button" value="Intakes"
          onclick="javascript: showIntakesPanel()"/>
      </div>--->
      <div class="col-md-3 TopMenuInstructor">
              <button class="InstructMenu"
              onclick="javascript: showStudentsPanel()">
                  <span>
                    <font face="marzo-w00-regular, fantasy" style="color:black;"><strong>

                        <h4><strong>Students</strong></h4>
                  </strong></font>
                  </span>
              </button>
      </div>
      <!---<div class="col-md-3">
          <input type="button" value="Students"
          onclick="javascript: showStudentsPanel()"/>
      </div>--->

  </div>
</div>
  <!----ADMIN HOME MENU END--->



  <script type="text/javascript">
console.log(window.location.pathname);
  var currentPanel = null;
  var currentDiv = null;

  function showProgramsPanel()
  {
    if (window.location.pathname != "/adminHome")
    window.location.href="/adminHome?p=1"

    if(currentDiv)
    currentDiv.fadeOut(100);

    if(currentPanel)
        currentPanel.fadeOut(100);
          currentPanel = $("#ProgramsPanel").fadeIn(10);
  }

  function showInstructorsPanel()
  {
    if (window.location.pathname != "/adminHome")
    window.location.href="/adminHome?p=2"

    if(currentDiv)
    currentDiv.fadeOut(100);

    if(currentPanel)
        currentPanel.fadeOut(100);
          currentPanel = $("#InstructorsPanel").fadeIn(10);
  }

  function showIntakesPanel()
  {
    if (window.location.pathname != "/adminHome")
    window.location.href="/adminHome?p=3"

    if(currentDiv)
    currentDiv.fadeOut(100);

    if(currentPanel)
        currentPanel.fadeOut(100);
          currentPanel = $("#IntakesPanel").fadeIn(10);
  }

  function showStudentsPanel()
  {
    if (window.location.pathname != "/adminHome")
    window.location.href="/adminHome?p=4"

    if(currentDiv)
    currentDiv.fadeOut(100);

    if(currentPanel)
        currentPanel.fadeOut(100);
          currentPanel = $("#StudentsPanel").fadeIn(10);
  }

  </script>
