@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="title">
  <h1>商品登録</h1>
</div>
<div class="form">
  <form action="{{route('product.store')}}" class="form__inner" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form__name">
      <p>商品名 <span class="required">必須</span></p>
      <input type="text" name="name" class="form__name-input" value="{{old('name')}}" placeholder="商品名を入力">
      <div class="error">
        @error('name')
        {{$message}}
        @enderror
      </div>
    </div>

    <div class="form__price">
      <p>値段 <span class="required">必須</span></p>
      <input type="text" name="price" class="form__price-input" value="{{old('price')}}" placeholder="値段を入力">
      <div class="error">
        @error('price')
        {{$message}}
        @enderror
      </div>
    </div>

    <div class="form__img">
      <p>商品画像 <span class="required">必須</span></p>
      <img id="preview" src="" alt="商品画像">
      <div class="file-upload">
        <input type="file" name="image" id="imageInput">
      </div>
      <div class="error">
        @error('image')
        {{$message}}
        @enderror
      </div>
    </div>

    <div class="form__season">
      <p>季節 <span class="required">必須</span><span class="multi-select"> 複数選択可能</span></p>
      @foreach($seasons as $season)
      <label>
        <input type="checkbox"
          name="seasons[]"
          value="{{$season->id}}"
          {{in_array($season->id,(array)old('seasons')) ? 'checked' :''}}>
        {{$season->name}}
      </label>
      @endforeach
      <div class="error">
        @error('seasons')
        {{$message}}
        @enderror
      </div>
    </div>
    <div class="form__description">
      <p>商品説明 <span class="required">必須</span></p>
      <textarea class="form__description-input" name="description" placeholder="商品の説明を入力" >{{old('description')}}</textarea>
      <div class="error">
        @error('description')
        {{$message}}
        @enderror
      </div>
    </div>
    <div class="form__function">
      <a class="form__function-back" href=" {{route('products.index')}}">戻る</a>
      <button class="form__function-submit" type="submit">登録</button>
    </div>
  </form>
</div>

{{-- ★★★ プレビュー表示用スクリプトを追加 ★★★ --}}
<script>
  document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(file);
    }
  });
</script>
@endsection