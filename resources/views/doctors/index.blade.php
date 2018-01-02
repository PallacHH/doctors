@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список докторов</div>

                    <div class="panel-body">
                        @foreach($doctors as $doctor)
                            <p>
                                <a href="{{ $doctor->path() }}">
                                    {{ $doctor->surname }} {{ $doctor->name }} {{ $doctor->second_name }}
                                </a>
                            </p>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
