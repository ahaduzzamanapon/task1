<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="{{asset('adminlogincss.css')}}">

</head>
<body>

<div id="bg"></div>


<form action="{{route('loginadmin')}}" method="post">
    @csrf
    <h2>Admin Login</h2>
    @if(Session::has('msg'))
    <p class="alert alert-info">{{ Session('msg') }}</p>
    @endif
  <div class="form-field">
    <input name="email" type="email" placeholder="Email.." required/>
  </div>

  <div class="form-field">
    <input name="password" type="password" placeholder="Password" required/>                         </div>

  <div class="form-field">
    <button class="btn" type="submit">Log in</button>
  </div>
</form>
<!-- partial -->

</body>
</html>
