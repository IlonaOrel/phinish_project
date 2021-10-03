<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DoctorPatient;

class Status extends Model
{
    protected $fillable = ['name',];

    /*
     *
     */
    public function doctorPatient(){
        return $this->hasMany(DoctorPatient::class);
    }

}
