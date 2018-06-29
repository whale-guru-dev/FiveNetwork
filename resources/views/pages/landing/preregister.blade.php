<html>
  <head>
    <meta charset="utf-8">
    <title>Family Investment Exchange | Pre-Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <meta name="description"  content="Family Investment Exchange" />
    <meta name="author" content="DAO">
    <meta name="keywords"  content="Family Investment Exchange" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{asset('assets/pre/css/preregister.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body id="pre">
    <div class="navbar">
      <a href="{{url('/')}}" class="upper-text">Apply Membership</a>
      <a href="{{url('/')}}" class="upper-text">Login</a>
    </div>

    <div class="header text-center">
      <h1 class="upper-text">Family Investment Exchange</h1>
      <p class="upper-text">Connecting Family Offices Around the World</p>
    </div>

    <form action="{{url('/preregister')}}" method="post" name="Pre-Register">
      @csrf
      

      <div class="input text-center">
        <label for="email">Email Address*</label>
        <br>
        <input type="email" id="email" name="email" placeholder="Please Input your Email Address" required="">
        <br>
        @if ($errors->any())
            <div class="alert alert-light" role="alert">
              @foreach ($errors->all() as $error)
                  {{ $error }}
              @endforeach
            </div>
        @endif
        <input type="submit" class="btn button" id="submit" value="Pre-Register">
      </div>
    </form>
  </body>
</html>