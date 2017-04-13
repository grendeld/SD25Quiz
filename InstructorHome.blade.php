<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Instructor home</title>
	<link rel="stylesheet" href= "/css/styles.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/bootstrap-grid.css">
	<link rel="stylesheet" href="/css/bootstrap-grid.min.css">

	<script src="js/bootstrap.min.js"></script>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 banner">
            <a href="#">Test Session</a>
            <a href="#" style="float: right">Logout</a>
              
            </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                <div class="row templateSelect">
                  Select Builder <br/>
                  <select text="Select Type" >
                  <option> Select Builder</option>
                  <option> Quiz Builder</Option>
                  <option> Q & A Builder </option>
                

                  </select>
                  </br>
                  <input style="float: right" type="Button" value="Go To"/>
                </div>
                <div class="row quizSelect">
                    <input type="Button" value="View"/>
                </div>
                <div class="row sendQuiz">
                     <input type="Button" value="View"/>
                </div>
              </div>

              <div class="col-md-6 workarea">
                    <div id="QA" style="visibility: visible; background-color: cyan" >
                <select id="ModulesSelect" >
                <option>Select Module </option>
                <option>Module #1 </option>  
                <option>Module #2 </option>
                <option>Module #3 </option>
                </select>
                <table>
                <tr>
                <td colspan="2" >Type Your Question Below</td>
                </tr>
                <tr>
                <td></td>
                <td ><textarea type="textarea" rows="5" cols="50" row="5" placeholder="Question" id="Question"></textarea><td>
                </tr>
                <tr>
                <td>A)</td>
                <td><input type="Text" placeholder="Option 1" id="Option1" /></td>
                </tr>
                <tr>
                <td>B)</td>
                <td><input type="Text" placeholder="Option 2" id="Option2" /></td>
                </tr>
                <tr>
                <td>C)</td>
                <td><input type="Text" placeholder="Option 3" id="Option3" /></td>
                </tr>
                <tr>
                <td>D)</td>
                <td><input type="Text" placeholder="Option 4" id="Option4" /></td>
                </tr>
                <tr>
                <td>E)</td>
                <td><input type="Text" placeholder="Option 5" id="Option5" /></td>
                </tr>
                <tr>
                <td>F)</td>
                <td><input type="Text" placeholder="Option 6" id="Option6" /></td>
                </tr>
                <tr ><td colspan="2" >Type the Letter of the right answer below</td></tr>
                <tr>
                <td></td>
                <td ><input type="text" placeholder="Example: A" id="RightAnswer" /></td>
                </tr>        
                </table>

                
                                <input type="Button" value="Previous" style="float:left;"  id="Prev"/>
                                                <input type="Button" value="Next" style="float:left;"  id="Next"/>
                                <input type="Button" value="Finish" style="float:right;"  id="Finish"/>
                    </div>

              </div>

              
              <div class="col-md-3 workview">
                <ul><li>Quiz #1</li></ul>
                 <ul><li>Quiz #2</li></ul>
              </div>
          </div>
      </div>
  </body>
  </html>
