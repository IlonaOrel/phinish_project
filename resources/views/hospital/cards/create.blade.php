@extends('layouts.app')
@section('title-block')
    create visit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{__('New visit')}}</h4></div>

                    <div class="card-body">
                        @include('common.errors')
                        <form method="POST" action="{{ route('cards.store', [$doctor->id, $patient->id]) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"> {{__('Patient')}}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="patient" value="{{ $patient->name }}" readonly/>
                                    <input id="name" type="hidden" class="form-control" name="patient_id" value="{{ $patient->id }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Doctor')}}</label>
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="doctor" value="{{ Auth::guard('doctor')->user()->name}}" readonly/>
                                    <input id="name" type="hidden" class="form-control" name="doctor_id" value="{{ Auth::guard('doctor')->user()->id }}"/>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="examination" class="col-md-4 col-form-label text-md-right">{{__('Examination')}}</label>
                                @if(count($examinations)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="examination_id">
                                            <option>Выберите вид обследования</option>
                                            @foreach($examinations as $examination)
                                                <option value="{{$examination->id}}">{{$examination->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="conclusion" class="col-md-4 col-form-label text-md-right">{{__('Conclusio')}}</label>
                                <div class="col-md-6">
                                    <textarea for="conclusion" name="conclusion" id="conclusion" class="from-control"cols="35" rows="5">{{ old('conclusion') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="treatment" class="col-md-4 col-form-label text-md-right">{{__('Treatment')}}</label>
                                <div class="col-md-6">
                                    <textarea for="treatment" name="treatment" id="treatment" class="from-control"cols="35" rows="5">{{ old('treatment') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_visit" class="col-md-4 col-form-label text-md-right">{{__('Date visit')}}</label>
                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="date_visit" value="{{ old('date') }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{__('Status')}}</label>
                                @if(count($statuses)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="status_id">
                                            <option>Выберите статус</option>
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Create
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

