{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Категории</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">Категории</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="primary">
        <p>
            <a href="{{ route('categories.create') }}" class="btn btn-success btn-lg">Создать</a>
        </p>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Категории</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $categories)
                            <tr>
                                <td>{{ $categories->id }}</td>
                                <td style="width: 100%">{{ $categories->title }}</td>
                                <td>
                                    <a href="{{ route('categories.show',[$categories->id]) }}"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('categories.edit',[$categories->id]) }}"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ route('categories.destroy',[$categories->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="bg-danger" type="submit">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
