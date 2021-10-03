@extends('layouts.app')
@section('title-block')
    create patient
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{__('Create new patient')}}</h4></div>
                        @include('common.errors')
                    <div class="card-body">
                        <form  method="POST" action="{{ route('patients.store', $doctor->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Photo')}}</label>

                                <div class="col-md-6">
                                    <input  type="file" class="form-control" name="photo" value="{{ old('name') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">{{__('Birthday')}}</label>

                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="birthday" value="{{ old('birthday') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{__('Address')}}</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="address" value="{{ old('address') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{__('Phone')}}</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="phone" value="{{ old('phone') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{__('E-Mail')}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confidant" class="col-md-4 col-form-label text-md-right">{{__('Confidant')}}</label>

                                <div class="col-md-6">
                                    <textarea for="confidant" name="confidant" id="confidant" class="from-control"cols="40" rows="5">
                                        {{ old('confidant') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Register new patient
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

