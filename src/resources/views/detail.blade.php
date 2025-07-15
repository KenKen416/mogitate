@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection
@section('content')
<div class="directory">
  <a href="{{route('products.index')}}">商品一覧</a>
  &nbsp>&nbsp{{$product->name}}
</div>
<div class="content">
  <form class="content__inner"  action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="info1">
      <div class="info1__img">
        <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}の画像">
      </div>
      <div class="info1__details">
        <div class="info1__details-name">
          <p>商品名</p>
          <input class="info1__details-name--input" type="text" value="{{$product->name}}" name="name">
        </div>
        <div class="info1__details-price">
          <p>値段</p>
          <input class="info1__details-price--input" type="text" value="{{$product->price}}" name="price" >
        </div>
        <div class="info1__details-seasons">
          <p>季節</p>
          @foreach($seasons as $season)
          <label>
            <input type="checkbox"
            name="seasons[]"
            value="{{$season->id}}"
            {{$product->seasons->contains('id',$season->id) ? 'checked' :''}}>
            {{$season->name}}
          </label>
          @endforeach
        </div>
      </div>
    </div>
    <div class="file-upload">
      <input type="file" name="image">
    </div>
    <div class="info2">
      <p>商品説明</p>
      <textarea class="info2__description" name="description">{{$product->description}}</textarea>
    </div>
    <div class="function">
      <a href="{{route('products.index')}}">戻る</a>
      <button type="submit" class="button-submit">変更を保存</button>
    </div>
  </form>
  <form action="{{route('product.destroy',$product->id)}}" class="delete" method="post">
    @method('DELETE')
    @csrf
    <button>削除</button>
  </form>
</div>
  @endsection