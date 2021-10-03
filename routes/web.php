<?php

//route::get('/', function (){
//    return view('welcome');
//});


Route::get('/', 'HospitalController@index')->name('hospital.home');

Route::group(['prefix' =>'doctor'], function() {

    Route::get('/about', 'HospitalController@getAbout')->name('hospital.about');

    Route::get('/contact', 'HospitalController@getContact')->name('hospital.contact');

    Route::get('/doctors', 'HospitalController@getAllDoctors')->name('hospital.doctors');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' =>'doctor'], function() {
    //=========================================================Маршруты авторизации...
    Route::get('/','DoctorController@index');

    Route::get('/login',['as' => 'doctor.login','uses' => 'AuthDoctor\LoginController@showLoginForm']);

    Route::post('/login',['uses' => 'AuthDoctor\LoginController@login']);

    Route::post('/logout',['as' => 'doctor.logout','uses' => 'AuthDoctor\LoginController@logout']);
    //================================= Маршруты регистрации...
    Route::get('/create', 'AuthDoctor\LoginController@createDoctor')->name('doctors.create');

    Route::post('/', 'AuthDoctor\LoginController@storeDoctor')->name('doctors.store');

    Route::group(['prefix' =>'{doctor}'], function() {
        //================doctors=============================
      Route::get('/', 'DoctorController@showDoctor')->name('doctors.show');

      Route::get('/edit', 'DoctorController@editDoctor')->name('doctors.edit');

      Route::patch('/', 'DoctorController@updateDoctor')->name('doctors.update');

      Route::group(['prefix' =>'patients'], function() {
          //=============patients===================================
          Route::get('/', 'PatientController@getAllPatients')->name('hospital.patients');

          Route::get('/create', 'PatientController@createPatient')->name('patients.create');

          Route::post('/', 'PatientController@storePatient')->name('patients.store');

          Route::group(['prefix' =>'{patient}'], function() {

              Route::get('/', 'PatientController@showPatient')->name('patients.show');

              Route::get('/edit', 'PatientController@editPatient')->name('patients.edit');

              Route::patch('/', 'PatientController@updatePatient')->name('patients.update');

              //===============================cards=======================
              Route::group(['prefix' =>'visits'], function() {
                  Route::get('/create', 'DoctorPatientController@createVisit')->name('cards.create');

                  Route::post('/', 'DoctorPatientController@storeVisit')->name('cards.store');

                  Route::group(['prefix' =>'{visit}'], function() {

                      Route::get('/edit', 'DoctorPatientController@editVisit')->name('cards.edit');

                      Route::patch('/', 'DoctorPatientController@updateVisit')->name('cards.update');
                  });
              });
          });
      });
    });
});
