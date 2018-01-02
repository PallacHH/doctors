@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $doctor->surname }} {{ $doctor->name }}</div>

                    <div class="panel-body">
                        <p>Специальности доктора: </p>
                        <ul>
                            @foreach($specialties as $specialty)
                                <li>{{ $specialty->name }}</li>
                            @endforeach
                        </ul>
                        {{ $doctor->education }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
