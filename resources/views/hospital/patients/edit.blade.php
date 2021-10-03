@extends('layouts.app')
@section('title-block')
    edit patient
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{__('Edit data about patient')}}</h4></div>

                    <div class="card-body">
                        @include('common.errors')
                        <form  method="POST" action="{{ route('patients.update', [$doctor->id, $patient->id]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $patient->name }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Photo')}}</label>

                                <div class="col-md-6">
                                    <input  type="file" class="form-control" name="photo" value="{{$patient->photo}}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">{{__('Birthday')}}</label>

                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="birthday" value="{{ $patient->birthday }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{__('Address')}}</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="address" value="{{ $patient->address }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{__('Phone')}}</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="phone" value="{{ $patient->phone }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{__('E-Mail')}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $patient->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confidant" class="col-md-4 col-form-label text-md-right">{{__('Confidant')}}</label>

                                <div class="col-md-6">
                                    <input id="confidant" type="text" class="form-control" name="confidant" value="{{ $patient->confidant }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>
  @endsection
