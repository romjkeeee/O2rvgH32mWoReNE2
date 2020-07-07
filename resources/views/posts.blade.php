{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Посты</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active">Посты</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Посты</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table   class="table table-responsive table-responsive" id="myTable">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Текст</th>
                            <th>Изображение</th>
                            <th>Автор</th>
                            <th>Избранное</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->text }}</td>
                                <td><img style="height: 100px; weight: 100px;" src="{{ $post->image }}" alt="img"></td>
                                <td style="width: 100%">{{ $post->author->name ?? '' }}</td>
                                <td>{{ $post->favorite()->count() }}</td>
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
@section('js')
    {{--        <script>--}}
    {{--            $(document).ready(function() {--}}
    {{--                $('#myTable').DataTable();--}}
    {{--            } );--}}
    {{--        </script>--}}
@stop
