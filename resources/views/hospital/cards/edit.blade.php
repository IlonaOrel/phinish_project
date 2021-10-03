@extends('layouts.app')
@section('title-block')
    edit visit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{__('Edit Examination')}}</h4> </div>

                    <div class="card-body">
                        @include('common.errors')
                        <form method="POST" action="{{ route('cards.update', [$doctor->id, $patient->id, $visit->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Patient')}}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="patient" value="{{ $patient->name }}" readonly/>
                                    <input id="name" type="hidden" class="form-control" name="patient_id" value="{{ $patient->id }}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Doctor')}}</label>
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="doctor" value="{{ $doctor->name}}" readonly/>
                                    <input id="name" type="hidden" class="form-control" name="doctor_id" value="{{ $doctor->id }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="examination" class="col-md-4 col-form-label text-md-right">{{__('Examination')}}</label>
                                @if(count($examinations)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="examination_id">
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
                                    <textarea for="conclusion" name="conclusion" id="conclusion" class="from-control"cols="35" rows="5">{{$visit->conclusion }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="treatment" class="col-md-4 col-form-label text-md-right">{{__('Treatment')}}</label>
                                <div class="col-md-6">
                                    <textarea for="treatment" name="treatment" id="treatment" class="from-control"cols="35" rows="5">{{$visit->treatment }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{__('Date visit')}}</label>
                                <div class="col-md-6">
                                    <input  type="datetime-local" class="form-control" name="date_visit" value="{{str_replace(' ', 'T',$visit->date_visit)}}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{__('Status')}}</label>
                                @if(count($statuses)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="status_id">
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
                                        <i class="fa fa-btn fa-user"></i> Edit
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


