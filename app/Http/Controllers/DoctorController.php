<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\Model\DoctorPatient;
use App\Model\Patient;
use App\Model\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\docRequest;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isDoctor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $doctor =  Auth::guard('doctor')->user();
        return view('home', ['doctor' => $doctor]);
    }

     /*
     *Получаем информацию об обном докторе
     */
    public function showDoctor($id)
    {
        $doctor = Doctor::find($id);
        $patients = DoctorPatient::with('status', 'doctor', 'patient')->where('doctor_id', $id)->get();
        return view('hospital.doctors.index', ['doctor' => $doctor, 'patients' => $patients]);
    }
    /*
     *Редактируем данные о докторе
     */
    public function editDoctor($id)
    {
        $doctor = Doctor::find($id);
        $specializations = Specialization::all();
        return view('hospital.doctors.edit', ['doctor' => $doctor, 'specializations' => $specializations]);
    }

    /*
     *Обновляем данные о докторе
     */
    public function updateDoctor($id, docRequest $request)
    {

        $doctorEdit = Doctor::find($id);
        $doctorEdit->photo = $request->photo;
        $doctorEdit->name = $request->name;
        $doctorEdit->phone = $request->phone;
        $doctorEdit->specialization_id = $request->specialization_id;
        $doctorEdit->password = $request->password;
        $doctorEdit->save();
        return redirect(route('doctors.show', $id));
    }
}
