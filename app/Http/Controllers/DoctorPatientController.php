<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\Model\Examination;
use App\Model\Status;
use Illuminate\Http\Request;
use App\Model\Patient;
use App\Model\DoctorPatient;
use App\Http\Requests;
use App\Http\Requests\CardRequest;

class DoctorPatientController extends DoctorController
{
    /*
     * Создаем новый визит в карточке пациента
     */
    public function createVisit($doctorId, $patientId){
        $patient = Patient::find($patientId);
        $doctor = Doctor::find($doctorId);
        $examinations = Examination::all();
        $statuses = Status::all();
        return view('hospital.cards.create', ['patient'=>$patient, 'doctor'=>$doctor, 'examinations'=>$examinations, 'statuses'=>$statuses]);
    }
    /*
     * Сохраняем данные о новом визите в карточке пациента
     */
    public function storeVisit(CardRequest $request, $doctorId, $patientId){
        $patient = Patient::find($patientId);
        $doctor = Doctor::find($doctorId);
        $visit = new DoctorPatient();
        $visit->patient_id = $request->patient_id;
        $visit->doctor_id = $request->doctor_id;
        $visit->examination_id = $request->examination_id;
        $visit->conclusion = $request->conclusion;
        $visit->treatment = $request->treatment;
        $visit->date_visit = $request->date_visit;
        $visit->status_id = $request->status_id;
        $visit->save();
        return redirect(route('patients.show', ['doctor'=>$doctor, 'patient'=>$patient]));
    }
    /*
     * Редактируем данные о новом визите в карточке пациента
     */
    public function editVisit($doctorId, $patientId, $visitId){
        $patient = Patient::find($patientId);
        $doctor = Doctor::find($doctorId);
        $visit = DoctorPatient::with('doctor', 'patient', 'examination', 'status')->find($visitId);
        $examinations = Examination::all();
        $statuses = Status::all();
        return view ('hospital.cards.edit', ['doctor'=>$doctor, 'patient'=>$patient, 'visit'=>$visit, 'examinations'=>$examinations, 'statuses'=>$statuses]);
    }
    /*
     * Обновляем данные о новом визите в карточке пациента
     */
    public function updateVisit($doctorId, $patientId, $visitId, CardRequest $request){
        $patient = Patient::find($patientId);
        $doctor = Doctor::find($doctorId);
        $visitEdit=DoctorPatient::find($visitId);
        if ($request->date_visit!==''){
            $visitEdit->date_visit = $request->date_visit;
        }
        $visitEdit->patient_id = $request->patient_id;
        $visitEdit->doctor_id = $request->doctor_id;
        $visitEdit->examination_id = $request->examination_id;
        $visitEdit->conclusion = $request->conclusion;
        $visitEdit->treatment = $request->treatment;
        $visitEdit->status_id = $request->status_id;
        $visitEdit->save();
        return redirect(route('patients.show', ['doctor'=>$doctor, 'patient'=>$patient]));

    }
}
