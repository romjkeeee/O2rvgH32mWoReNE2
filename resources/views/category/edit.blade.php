

    {{-- resources/views/admin/dashboard.blade.php --}}

    @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Редактирование категории</h3>
        </div>
    <div class="panel panel-default">
        <div class="card-body">
            <form action="{{ route('categories.update', $data) }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                    <div class="form-group">
                        <label for="inputForName">Название</label>
                        <input class="form-control"  style="" name="title" id="inputname"  placeholder="title"  value="{{ $data->title }}" >
                    </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary margin-r-5">Сохранить</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Назад</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
