@extends('layouts.app')
@section('title-block')
   patient info
@endsection
@section('asideDoctor')
    @parent
    <div class="row">
        <h4>
            <a  href="{{ route('patients.edit', [Auth::guard('doctor')->user()->id, $patient->id])}}">
                Edit data patient
            </a>
        </h4>
    </div>
    <div class="row">
        <h4>
            <a  href="{{ route('cards.create', [Auth::guard('doctor')->user()->id, $patient->id])}}">
                New visit
            </a>
        </h4>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card col-md-6">
                    <div class="card-img-overlay">
                        <img src="{{\App\Model\Patient::getImage($patient->photo)}}" class="img-thumbnail img-fluid" width="50%" alt="Photo patient" />
                    </div>
                </div>
                <div class="card offset-md-4">
                    <div class="list-group justify-content-center">
                        <h2>{{$patient->name}}</h2>
                        <p> Birthday: {{$patient->birthday}}</p>
                        <p> Address: {{$patient->address}}</p>
                        <p> Phone: {{$patient->phone}}</p>
                        <p> Email: {{$patient->email}}</p>
                        <p> Confidant: {{$patient->confidant}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    @if (count($visits) > 0)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-striped task-table">
                                    <br/>
                                    <h3>Patient appeals</h3>
                                    <!-- Заголовок таблицы -->
                                    <thead>
                                    <tr>
                                        <th>Date visit</th>
                                        <th>Doctor</th>
                                        <th>Examination</th>
                                        <th>Conclusion</th>
                                        <th>Treatment</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($visits as $visit)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{$visit->date_visit}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->doctor->name}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->examination->name}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->conclusion}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->treatment}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->status->name}}</div>
                                            </td>
                                            @if($visit->status->name !=='discharged')
                                                <td>
                                                    @if((Auth::guard('doctor')->user()->id)==$visit->doctor_id)
                                                        <a  href="{{ route('cards.edit', [$doctor->id, $patient->id, $visit->id]) }}">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-btn"></i> Edit
                                                            </button>
                                                        </a>
                                                    @else
                                                        <div>You  cannot edit this entry. See your doctor {{$visit->doctor->name}}</div>
                                                    @endif
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                        <div>
                            <a  href="{{ route('cards.create', [Auth::guard('doctor')->user()->id, $patient->id]) }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> New visit
                                </button>
                            </a>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
