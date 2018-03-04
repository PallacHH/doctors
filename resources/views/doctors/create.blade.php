@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление нового доктора</div>
                    <div class="panel-body">
                       <form action="{{ route('doctors.store', ['city' => $cityName]) }}" method="POST">
                           {{ csrf_field() }}
                           <div class="form-group">
                              <label id="">Фамилия</label>
                              <input type="text" name="surname" class="form-control"/>
                           </div>
                           <div class="form-group">
                              <label id="">Имя</label>
                              <input type="text" name="name" class="form-control"/>
                           </div>
                           <div class="form-group">
                              <label id="">Отчество</label>
                              <input type="text" name="second_name" class="form-control"/>
                           </div>
                           <div class="form-group">
                              <label id="">Дата рождения</label>
                              <input type="date" name="birthday" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <label id="">Образование</label>
                               <textarea name="education" class="form-control"></textarea>
                           </div>
                           <div class="form-group">
                              <label id="">Сертификаты</label>
                              <input type="text" name="certificates" class="form-control"/>
                           </div>
                           <div class="form-group">
                               <input type="submit" value="Создать" class="btn btn-success"/>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
