@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection

@section('content')
<div class="title">
  <h1>商品一覧</h1>
  @if(session('success'))
  <div class="success">{{session('success')}}</div>
  @endif
  <a class="button-register" href="{{route('product.register')}}">＋商品を追加</a>
</div>
<div class="main-contents">

  <div class="function">
    <div class="function__search">
      <form action="{{route('products.search')}}" class="search__inner" method="get">
        <input type="text" class="search__input-keyword" placeholder="商品名で検索" name="keyword" value="{{request('keyword')}}">
        <button class="search__submit">検索</button>
      </form>
    </div>
    <div class="function__sort">
      <div class="sort__title">
        <p>価格順で表示</p>
      </div>
      <form action="{{route('products.search')}}" method="get" id="sortForm">
        <input type="hidden" name="keyword" value="{{request('keyword')}}">
        <div class="sort__select">
          <select name="sort" onchange="document.getElementById('sortForm').submit()">
            <option value="">価格で並べ替え</option>
            <option value="high" {{request('sort')=='high' ? 'selected' : ''}}>高い順に表示</option>
            <option value="low" {{request('sort')=='low' ? 'selected' : ''}}>低い順に表示</option>
          </select>
        </div>
      </form>
      @if(request('sort'))
      <div class="sort__tag">
        @if(request('sort')=='high')
        高い順に表示
        @elseif(request('sort')=='low')
        低い順に表示
        @endif
        <a href="{{route('products.search',['keyword'=> request('keyword')])}}" class="sort__tag--clos">×</a>
      </div>

      @endif
    </div>
  </div>
  <div class="items">
    <div class="items__list">
      <!-- 繰り返し処理 -->
      @if($products->count())
      @foreach($products as $product)
      <a href="{{route('product.detail',$product->id)}}" class="items__card">
        <div class="card__img">
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}の画像">
        </div>
        <div class="card__text">
          <div class="card__name">{{$product->name}}</div>
          <div class="card__price">{{'¥' . $product->price}}</div>
        </div>
      </a>
      @endforeach
      @else
      <p>該当する商品が見つかりませんでした</p>
      @endif

    </div>
    <div class="paging">
      {{$products->appends(['keyword'=>request('keyword'),'sort'=>request('sort')])->Links('pagination::bootstrap-4')}}
    </div>
  </div>
</div>
@endsection