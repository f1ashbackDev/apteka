@extends('new_admin.layout.admin')
@section('content')
    <div class="d-flex">
        <h2>Каталоги сайта</h2>
        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Создать каталог
        </button>
    </div>

    <table class="table">
        <tr>
            <th>Номер каталога</th>
            <th>Название каталога</th>
            <th>Действие</th>
        </tr>
        @foreach($category as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->categories_name}}</td>
                <td>
                    <a href="{{route('admin.category.edit', $item)}}">Изменить</a>
                    <a href="{{ route('admin.category.delete', $item) }}">Удалить</a>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Создание нового каталога</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Название каталога</label>
                            <input type="text" class="form-control" id="name" placeholder="бургер" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="photoFile" class="form-label">Фотография каталога</label>
                            <input class="form-control" type="file" id="photoFile" name="image">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Создать</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
