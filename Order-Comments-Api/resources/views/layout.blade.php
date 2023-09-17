<!DOCTYPE html>
<html>
<head>
  <title>
    @yield('title', 'Blog')
  </title>
</head>
<body>

<ul class="nav">
</ul>


@if (session('success'))
  <div class="flash-success">
      {{ session('success') }}
  </div>
@endif

<div class="main">
	@yield('content')
</div>

</body>
</html>
