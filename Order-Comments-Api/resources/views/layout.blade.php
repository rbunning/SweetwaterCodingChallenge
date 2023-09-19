<!DOCTYPE html>
<html>

<head>
  <title>
    @yield('title', 'Admin')
  </title>
  <style>
    .collapsible {
      color: white;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
    }

    .comment{
      background-color: #0e427d;
    }

    .category{
      background-color: #777;
    }


    .active,
    .collapsible:hover {
      background-color: #555;
    }

    .content {
      padding: 0 18px;
      display: none;
      overflow: hidden;
      background-color: #f1f1f1;
    }
  </style>
</head>

<body>

  <div class="main">
    @yield('content')
  </div>
</body>

</html>