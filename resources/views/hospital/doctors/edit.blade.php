@extends('layouts.app')
@section('title-block')
   edit doctor
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{__('Edit')}}</h4>
                    </div>
                    <div class="card-body">
                        @include('common.errors')
                            <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $doctor->name }}"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                                    <div class="col-md-6">
                                        <input  type="file" class="form-control" name="photo" value="{{ old('photo')}}"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}Phone</label>
                                    <div class="col-md-6">
                                        <input  type="text" class="form-control" name="phone" value="{{ $doctor->phone }}"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="specialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>
                                    @if(count($specializations)>0)
                                        <div class="col-md-6">
                                            <select size="1" class="form-control"  name="specialization_id">
                                                @foreach($specializations as $specializations)
                                                    <option value="{{$specializations->id}}">{{$specializations->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
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

