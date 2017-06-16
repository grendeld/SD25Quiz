<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home Page
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index');

//Route::get('/', 'InstructorsController@main');
Route::get('/instructorHome', 'InstructorsController@main');
Route::post('/moduleDelete','ModulesController@deleteModule');
Route::post('/saveTemplate','QuizController@saveTemplate');
Route::post('/moduleSave', 'ModulesController@saveModule');
//Route::get('/getStudents','StudentsController@IntakeStudents');
Route::get('/getQuizList','QuizController@IntakeQuiz');
Route::get('/startTest','QuizController@StartTest');

//AdminHome
Route::get('/adminHome', 'AdminsController@main');
Route::get('/InstrIntAdd','AdminsController@InstrIntAdd');
Route::get('/InstrIntRemove','AdminsController@InstrIntRemove');
Route::get('/instructor/add', function(){ return view('newInstructor');});
Route::get('/instructor/{instructor}', 'InstructorsController@showedit');
Route::patch('/instructor/{instructor}/edit', 'InstructorsController@edit');
Route::get('/instructor/{instructor}/delete', 'InstructorsController@delete');
Route::post('/newintake','IntakesController@create');

//StudentHome
Route::get('/StudentHome', 'StudentsController@main');


//d3/charts Routes
Route::get('/intakesd3','d3@getIntakes');
Route::get('/programByType','d3@getProgramsByType');
Route::get('/charts',function(){ return view('chartTest');});

//function(){return "test";}







//--------------------------------------OLD------------------------------------------------------------------
Route::get('/admin', 'AdminsController@show');

Route::get('/admin/add', function(){ return view('newadmin'); });

Route::post('/admin/add', 'AdminsController@create');
//---Programs
Route::get('/program', 'ProgramsController@show');
Route::get('/program/add', function(){ return view('newProgram'); });
Route::post('/program/add', 'ProgramsController@create');
Route::get('/program/{program}', 'ProgramsController@showedit');
Route::patch('/program/{program}/edit', 'ProgramsController@edit');
Route::get('/program/{program}/delete', 'ProgramsController@delete');
//---Modules
Route::post('/module','ModulesController@deleteMod');
Route::get('/program/{program}/module/{module}/edit', 'ModulesController@showEdit');
Route::patch('/{program}/{module}', 'ModulesController@edit');
Route::post('/program/{program}/newModule', 'ModulesController@NewModule');
Route::put('/newModule','ModulesController@AddModule');
//---Quizzes
Route::get('/quizzes', 'QuizController@showAll');
Route::get('/quiz/{quiz}','QuizController@showOne');
Route::post('/newQuiz','QuizController@saveTemplate');
Route::post('/quiz/{quiz}/newQA', 'QuizController@newQA');
Route::patch('/quiz/{quiz}/editQuiz', 'QuizController@EditQuiz');
Route::get('/question/{question}/delete','QuizController@DeleteQuestion');
Route::get('/quiz/{quiz}/copy','QuizController@copyQuiz');
Route::get('/quiz/{quiz}/delete','QuizController@deleteQuiz');

//---Students
Route::get('/student','StudentsController@StudentSearch');
Route::put('/student', 'StudentsController@create');
Route::patch('/student/{student}/edit', 'StudentsController@edit');
Route::delete('/student','StudentsController@delete');
Route::get('/newStudent', 'StudentsController@newStudent');
Route::get('/student/{student}','StudentsController@showedit');

//---Instructor
Route::get('/instructor', 'InstructorsController@show');
Route::get('/instructor/add', function(){ return view('newInstructor');});
Route::post('/instructor/add', 'InstructorsController@create');
//---Intake
Route::get('/intake', 'IntakesController@show');
Route::get('/intake/add', function(){ return view('newIntake');});
Route::post('/intake/add', 'IntakesController@create');
Route::get('/intake/{intake}', 'IntakesController@showedit');
Route::patch('/intake/{intake}/edit', 'IntakesController@edit');
Route::get('/intake/{intake}/delete', 'IntakesController@delete');
//InstructorIntake
Route::get('/instructorIntake', 'InstructorIntakesController@show');
Route::get('/instructorIntake/add', function(){ return view('newInstructorIntake');});
Route::post('/instructorIntake/add', 'InstructorIntakesController@create');
//Pages for doing test
Route::get('/test/Instructor/{id}','QuizController@ControlTest');//Instructor side
Route::get('/test/Student/{id}','QuizController@TakeTest'); //Student side
// ------------Should be in a controller
Route::get('test/Page',function(){ return view('student.question');});
Route::get('test/Page/{int}',function($int){
    $quest = \App\Test\Providers\TestProvider::create()->get($int);
    return view('student.question',compact('quest'));});
Route::post('test/Page',function(){
    \App\Test\Providers\TestProvider::create()->answer($_POST["answer"]?? null);
    return view('student.question');});
Route::post('test/Save',function(){
    if(\App\Test\Providers\TestProvider::create()->save()){
       return redirect('/StudentHome');
    }
    else{
        $error= "sorry bud";
       return back()->with('error','Sorry bud');
    }
});
//Security
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
