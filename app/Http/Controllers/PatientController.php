<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\Model\DoctorPatient;
use Illuminate\Http\Request;
use App\Model\Patient;
use App\Http\Requests\PatientRequest;

class PatientController extends DoctorController
{
    /*
     *Отображение всех пациентов клиники
     */
    public function getAllPatients($id){
        $doctor = Doctor::find($id);
        $patients=Patient::all();
        return view('hospital.patients.allPatients', ['doctor'=>$doctor, 'patients'=>$patients]);
    }
    /*
     *Отображение карточки пациента. Все его данные и все визиты в больницу
     */
    public function showPatient($doctorId, $patientId){
        $doctor = Doctor::find($doctorId);
        $patient = Patient::find($patientId);
        $visits = DoctorPatient::with('status', 'doctor', 'patient')->where('patient_id', $patientId)->get();
        return view('hospital.patients.index', ['doctor'=>$doctor, 'patient'=>$patient, 'visits'=>$visits]);
    }
    /*
     * Создание карточки пациента
     */
    public function createPatient($id){
        $doctor = Doctor::find($id);
        return view('hospital.patients.create', ['doctor'=>$doctor]);
    }
    /*
     * Сохранение данных пациента
     */
    public function storePatient(PatientRequest $request, $doctorId){
        $doctor = Doctor::find($doctorId);
        $patient = new Patient();
        $patient->photo = $request->photo;
        $patient->name = $request->name;
        $patient->birthday = $request->birthday;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->confidant = $request->confidant;
        $patient->save();
        return redirect(route('patients.show', [ 'doctor'=>$doctor->id,'patient'=>$patient->id]));
    }
    /*
     * Редактирование данных пациента
     */
    public function editPatient($doctorId, $patientId){
        $doctor = Doctor::find($doctorId);
        $patient=Patient::find($patientId);
        return view('hospital.patients.edit', [ 'doctor'=>$doctor, 'patient'=>$patient]);
    }
    /*
     * Сохранение отредактированых данных
     */
    public function updatePatient($doctorId, $patientId, PatientRequest $request){
        $doctor = Doctor::find($doctorId);
        $patientEdit = Patient::find($patientId);
        if ($request->photo!==''){
            $patientEdit->photo = $request->photo;
        }
        $patientEdit->name = $request->name;
        $patientEdit->birthday = $request->birthday;
        $patientEdit->address = $request->address;
        $patientEdit->phone = $request->phone;
        $patientEdit->email = $request->email;
        $patientEdit->confidant = $request->confidant;
        $patientEdit->save();
        return redirect(route('patients.show', ['doctor'=>$doctor, 'patient'=>$patientEdit]));
    }
}
