@extends('layouts.app')
@section('title-block')
    Doctor site
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Hello dr.{{$doctor->name}}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="{{\App\Model\Doctor::getImage($doctor->photo)}}" class="img-thumbnail " alt="Photo doctor" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information">
                                    <h2>{{$doctor->name}}</h2>
                                    <p> Specialization: {{$doctor->specialization->name}}</p>
                                    <p> Phone: {{$doctor->phone}}</p>
                                    <p> Email: {{$doctor->email}}</p>
                                </div>
                                <div>
                                    <a  href="{{ route('doctors.show', $doctor->id) }}">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> My patients
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
