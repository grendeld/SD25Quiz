<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $primaryKey = 'ProgramID';
    protected $fillable=['ProgramName','ProgramType','Active'];
    public $timestamps = false;

    public function modules()
    {
    return $this->hasMany('App\Module','ProgramID','ProgramID');
    }

<<<<<<< HEAD

    public function intakes()
    {
    return $this->hasMany('App\Intake','ProgramID','ProgramID');
    }



=======
>>>>>>> 05b55c3a9c8be72a0d51d24f723c78aaddd62cb8
}
