<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <link rel="shorcut icon" href="{{ url('images/themes/icon.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('bs/css/bootstrap.min.css') }}" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('bs/css/font-awesome.min.css') }}" />
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="{{ url('bs/css/simple-line-icons.css') }} " />
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="{{ url('bs/css/slick.css') }} " />
    <link rel="stylesheet" href="{{ url('bs/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ url('bs/css/owl.carousel.min.css') }}" />
    <!-- Main CSS -->
    <link href="{{ url('bs/css/style.css') }}" rel="stylesheet" />
     <link href="{{ url('bs/css/signin.css') }}" rel="stylesheet" />

    <title>Document</title>
</head>
<body class="text-center">
    
     <form action="/login" method="post" class="form-signin">
        @csrf

        @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissable fade show">
          {{ session('loginSuccess') }}    
        </div>

        @elseif (session()->has('loginError'))
           <div class="alert alert-danger alert-dismissable fade show">
                {{ session('loginError') }}    
           </div>
        @endif

      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="username" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
</body>
</html>