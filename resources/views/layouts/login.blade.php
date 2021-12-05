<html>
<head>
  <title>Blog</title>
  <style>
    .content{
      /* background-image:linear-gradient(to right,#C9D6FF,#E2E2E2); */
      height:600px;
      background-color: #eee;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    @include('includes.header')
  </header>
  <div class="content d-flex align-items-center py-3 py-md-0">
    <div class="container">
      @yield('content')
    </div>
  </div>
  <footer class="container"></footer>
</body>
</html>