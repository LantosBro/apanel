@extends('layouts.admin_layout')

@section('title', 'Все книги')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все книги</h1>
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
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">
                                ID
                            </th>
                            <th style="width: 45%">
                                Название
                            </th>
                            <th style="width: 20%">
                                Автор
                            </th>
                            <th style="width: 30%">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>
                                    {{ $book['id'] }}
                                </td>
                                <td>
                                    {{ $book['title'] }}
                                </td>
                                <td>
                                    {{ $book->author->name }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('books.edit', $book['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Изменить
                                    </a>
                                    <form method="post" action="{{ route('books.destroy', $book['id'])}}" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
