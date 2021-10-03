@extends('layouts.app')
@section('title-block')
    doctor
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <h2 class="col-sm-9 padding-right">Hello dr.{{$doctor->name}}</h2>
        <div class="product-details">
            <div class="row">
                <div class="col-sm-5">
                    <div class="view-product">
                        <img src="{{\App\Model\Doctor::getImage($doctor->photo)}}" class="img-thumbnail " alt="Photo doctor" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="product-information">
                        <p> Specialization: {{$doctor->specialization->name}}</p>
                        <p> Phone: {{$doctor->phone}}</p>
                        <p> Email: {{$doctor->email}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (count($patients) > 0)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <br/>
                                    <h3>My patient</h3>
                                    <!-- Заголовок таблицы -->
                                    <thead>
                                    <tr>
                                        <th>photo</th>
                                        <th>Name</th>
                                        <th>Birthday</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td class="table-text">
                                                <div class="patients-image-wrapper">
                                                    <img src="{{\App\Model\Patient::getImage($patient->patient->photo)}}" class="img-thumbnail img-fluid" width="20%" alt="Photo patient" />
                                                </div>
                                            </td>
                                            <td class="table-text">
                                                <a href="{{ route('patients.show', [$doctor->id, $patient->patient->id])}}">
                                                    <div>{{ $patient->patient->name }}</div>
                                                </a>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $patient->patient->birthday }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $patient->status->name }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @else
                        <div><h3>You don`t have patients</h3></div>
                    @endif
                </div>
            </div>
            <div>
                <a  href="{{ route('patients.create', $doctor->id) }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Add New Patient
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
