<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(){
        return view('hospital.index');
    }
    public function getAbout(){
        return view('hospital.about');
    }

    public function getContact(){
        return view('hospital.contact');
    }
    /*
    *Получаем всех докторов больницы
    */

    public function getAllDoctors()
    {
        $doctors = Doctor::with('specialization')->get();
        //dd($doctors);
        return view('hospital.allDoctors', ['doctors' => $doctors]);
    }
}
