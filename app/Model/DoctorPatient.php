<?php

namespace App\Model;

use App\Model\Doctor;
use App\Model\Examination;
use App\Model\Patient;
use App\Model\Status;
use Illuminate\Database\Eloquent\Model;


class DoctorPatient extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'examination_id', 'conclusion','treatment', 'date_visit', 'status_id',];

    /*
     *
     */
    public function status(){
        return $this->belongsTo(Status::class);
    }
    /*
 *
 */
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    /*
     *
     */
    public function examination(){
        return $this->belongsTo(Examination::class);
    }
    /*
 *
 */
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
