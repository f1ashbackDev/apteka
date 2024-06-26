@extends('new_admin.layout.admin')
@section('content')
    <h2>Изменение каталога:</h2>
    <form action="{{ route('admin.category.update', $categories) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3 d-flex flex-column col-sm-9">
            <label>Название каталога</label>
            <p>{{$categories->categories_name}}</p>
            <input type="text" class="form-control" aria-label="" style="width: 350px; height: 30px;" name="name">
        </div>
        <label>
            Текущие фотография каталога:
            <img src="{{ asset('/storage/'. $categories->image) }}" style="width: 250px;height: 250px;">
        </label>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Добавить или изменить фотографию</label>
            <input class="form-control" type="file" name="image[]" id="formFileMultiple" multiple>
        </div>
        <input type="submit" placeholder="Создать" class="btn btn-primary"/>
    </form>
@endsection
