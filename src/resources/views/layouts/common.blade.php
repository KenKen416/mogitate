<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  @yield('css')
  <title>mogitate</title>
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a href="/products">mogitate</a>
    </div>
  </header>
  <main>

    @yield('content')
  </main>
</body>

</html>