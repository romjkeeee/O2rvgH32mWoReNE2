{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Просмотр категории</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="">
            <div class="card-body">
                <div class="form-group">
                    <label>Название</label>
                    <input class="form-control" value="<?=$data->title?>" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <a href="{{ route('categories.index') }}" class="btn btn-default">Назад</a>

        </form>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
