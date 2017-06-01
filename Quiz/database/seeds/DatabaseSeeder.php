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
<<<<<<< HEAD
        factory(App\User::class, 50)->create();
      $this->call(ProgramsSeeder::class);
       $this->call(ModulesSeeder::class);
        $this->call(IntakesSeeder::class);
       $this->call(QuizSeeder::class);
       $this->call(StudentsSeeder::class);
       $this->call(QuestionSeeder::class);
       $this->call(AnswersSeeder::class);
       $this->call(InstructorsSeeder::class);
$this->call(InstructorIntakeSeeder::class);
=======
       $this->call(ProgramsSeeder::class);
       $this->call(ModulesSeeder::class);
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
    }
}
