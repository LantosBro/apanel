@extends('layouts.admin_layout')

@section('title', 'Добавление книги')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление книги</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <h3><i class="icon fa fa-check"></i>{{ session('success') }}</h3>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="bookName">Название книги</label>
                                    <input id="bookName" type="text" name="title" class="form-control" placeholder="Введите название книги" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookDescription">Описание книги</label>
                                    <input id="bookDecription" type="text" name="description" class="form-control" placeholder="Опишите книгу" required>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Выберите автора</label>
                                        <select name="author_id" class="form-control" required>
                                            @foreach ($authors as $author)
                                                <option value="{{ $author['id'] }}">{{ $author['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
