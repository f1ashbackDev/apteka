@extends('new_admin.layout.admin')
@section('content')
    <h2>Изменение продукта:</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-primary" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data"
          class="d-flex flex-column">
        @csrf
        <div class="input-group mb-3 d-flex flex-column col-sm-9">
            <label>Название продукта</label>
            <p>{{$product->name}}</p>
            <input type="text" class="form-control" aria-label="" style="width: 350px; height: 30px;" name="name" value="{{$product->name}}">
        </div>
        <div class="input-group mb-3 d-flex flex-column col-sm-9">
            <label>Цена товара</label>
            <p>{{$product->price}}</p>
            <input type="text" class="form-control" aria-label="" style="width: 350px; height: 30px;" name="price" value="{{$product->price}}">
        </div>
        <div class="input-group mb-3 d-flex flex-column col-sm-9">
            <label>Кол-во на складе</label>
            <p>{{$product->count}}</p>
            <input type="text" class="form-control" aria-label="" style="width: 350px; height: 30px;" name="count" value="{{$product->count}}">
        </div>
        <div class="input-group mb-3 d-flex flex-column col-sm-9">
            <label>Описание продукта</label>
            <p>{{$product->description}}</p>
            <input type="text" class="form-control" aria-label="" style="width: 350px; height: 30px;" name="description" value="{{$product->description}}">
        </div>
        <label>
            Категория товара: {{ $name_category }}
            <select class="form-select" name="category" style="width: 350px; height: 40px;">
                @foreach($category as $item)
                    <option value="{{$item->id}}">{{$item->categories_name}}</option>
                @endforeach
            </select>
        </label>
        <label>
            Текущие фотографии продукта:
            @foreach($image as $item)
                <img src="{{ asset('/storage/' . $item->image) }}" style="width: 250px; height: 250px"/>
            @endforeach
        </label>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Добавьте или измените фотографии</label>
            <input class="form-control" type="file" id="formFileMultiple" name="image[]" multiple>
        </div>
        <input type="submit" placeholder="Создать" class="btn btn-primary"/>
    </form>
@endsection
