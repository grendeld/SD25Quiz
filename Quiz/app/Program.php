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


    public function intakes()
    {
    return $this->hasMany('App\Intake','ProgramID','ProgramID');
    }



}
