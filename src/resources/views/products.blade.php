@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection

@section('content')
<div class="title">
  <h1>商品一覧</h1>
</div>
<div class="main-contents">

  <div class="function">
    <div class="function__search">
      <form action="" class="search__inner">
        <input type="text" class="search__input-keyword" placeholder="商品名で検索">
        <button class="search__submit">検索</button>
      </form>
    </div>
    <div class="function__sort">
      <div class="sort__title">
        <p>価格順で表示</p>
      </div>
      <div class="sort__select">
        <select name="" id="">
          <option value="">価格で並べ替え</option>
          <option value="">高い順に表示</option>
          <option value="">低い順に表示</option>
        </select>
      </div>
      <div class="sort__tag">
        高い順に表示 ×
      </div>
    </div>
  </div>
  <div class="items">
    <div class="items__list">
      <!-- 繰り返し処理 -->
      @foreach($products as $product)
      <a href="{{route('product.detail',$product->id)}}" class="items__card">
        <div class="card__img">
          <img src="{{ asset('storage/' . $product->image) }}" alt=>
        </div>
        <div class="card__text">
          <div class="card__name">{{$product->name}}</div>
          <div class="card__price">{{'¥' . $product->price}}</div>
        </div>
      </a>
      @endforeach

    </div>
    <div class="paging">
      {{$products->Links('pagination::bootstrap-4')}}
    </div>
  </div>
</div>
@endsection