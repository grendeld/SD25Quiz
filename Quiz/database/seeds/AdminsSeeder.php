<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
         'FirstName'=>'Belle',
         'LastName'=>'Lee',
          'email' => 'Belle@gmail.com',
        'password' => bcrypt('password')
      ]);
      DB::table('admins')->insert([
         'FirstName'=>'Oscar',
         'LastName'=>'Wu',
          'email' => 'Oscar@gmail.com',
        'password' => bcrypt('password')
      ]);
    }
}
