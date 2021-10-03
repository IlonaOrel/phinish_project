@extends('layouts.app')
@section('title-block')
    all doctors
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content">
            <div class="col-md-12">
                 <div class="card">
                        @if (count($doctors) > 0)
                        <div class="padding-centre">
                            <div class="card-header">
                                  <h2 class="title text-center">{{__('All doctor')}}s</h2>
                            </div>
                            <div class="card-body">
                                <div class="card-group">
                                    @foreach ($doctors as $doctor)
                                        <div class="col-sm-4 padding-10">
                                            <div class="doctors-image-wrapper">
                                                <div class="single-doctors">
                                                    <div class="doctors-info text-center">
                                                        <img src="{{App\Model\Doctor::getImage($doctor->photo)}}" class="img-thumbnail" alt="Photo patient" />
                                                        <a href="{{ route('doctors.show', $doctor->id)}}">
                                                            <h2>{{$doctor->name}}</h2>
                                                        </a>
                                                        <div>{{ $doctor->specialization->name}}</div>
                                                        <div>{{ $doctor->phone }}</div>
                                                        <div>{{ $doctor->email }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            </div>
                        </div>

                        @else
                            <div>Sorry, doctors epsent!</div>
                        @endif
                    </div>

            </div>
        </div>

@endsection



