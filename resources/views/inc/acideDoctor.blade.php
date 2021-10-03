@section('asideDoctor')
    <div class="aside">
        <div class="col-sm-offset-2">
            <div class="row">
                <h4>
                    <a  href="{{ route('doctors.show', Auth::guard('doctor')->user()->id)}}">
                        My site
                    </a>
                </h4>
            </div>
            <div class="row">
                <h4>
                    <a  href="{{ route('doctors.edit', Auth::guard('doctor')->user()->id)}}">
                        Edit my data
                    </a>
                </h4>
            </div>
            <div class="row">
                <h4>
                    <a  href="{{ route('hospital.patients', Auth::guard('doctor')->user()->id) }}">
                        All Patients
                    </a>
                </h4>
            </div>
            <div class="row">
                <h4>
                    <a  href="{{ route('patients.create', Auth::guard('doctor')->user()->id) }}">
                        Add New Patient
                    </a>
                </h4>
            </div>
            <div > @show</div>
        </div>
    </div>

