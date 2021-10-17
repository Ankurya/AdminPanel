<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->
    <link href="{{ url('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- NProgress -->
    <link href="{{ url('admin/css/nprogress.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Animate.css -->
    <link href="{{ url('admin/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Custom Theme Style -->
    <link href="{{ url('admin/css/custom.min.css') }}" rel="stylesheet" type="text/css"/>


    <style>

element.style {
    margin-top: 38px;
}

.alert-success {
    background-color: lightslategray;
    border-color: rgba(38, 185, 154, 0.88);
}

</style>

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>


@if ($message = Session::get('success'))  
<div class="alert alert-success alert-block">  
    <button type="button" class="close" data-dismiss="alert">x</button>   
        <strong>{{ $message }}</strong>  
</div>  
@endif  
  
@if ($message = Session::get('error'))  
<div class="alert alert-danger alert-block">  
    <button type="button" class="close" data-dismiss="alert">x</button>   
        <strong>{{ $message }}</strong>  
</div>  
@endif  
  
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <form action="{{url('login')}}" method="post">
         {{csrf_field()}}             
        <h1>Login Form</h1>
              <div>
              <input type="email" class="form-control" placeholder="Enter email" name="email">
              </div>
              <div>
              <input type="password" class="form-control"  placeholder="Enter password" name="password">
              </div>
              <div>
              <button type="submit" class="btn btn-primary">Login</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="{{url('register')}}" class="to_register"> Create Account </a>
                </p>

            
              </div>
            </form>
          </section>
        </div>

     
      </div>
    </div>
  </body>
</html>
