<?php

namespace App\Model;

use App\Model\DoctorPatient;
use Illuminate\Database\Eloquent\Model;


class Examination extends Model
{
    protected $fillable = ['name',];

    /*
    *
    */
    public function doctorPatient(){
        return $this->hasMany(DoctorPatient::class);
    }
}
