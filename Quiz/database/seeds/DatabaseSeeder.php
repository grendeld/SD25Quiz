<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $this->call(ProgramsSeeder::class);
       $this->call(ModulesSeeder::class);
       $this->call(QuizSeeder::class);
       $this->call(StudentsSeeder::class);
       $this->call(QuestionsSeeder::class);
       $this->call(AnswersSeeder::class);
       $this->call(InstructorsSeeder::class);
        $this->call(TestsSeeder::class);
    $this->call(IntakesSeeder::class);
$this->call(InstructorIntakeSeeder::class);
    }
}
