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
  <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome -->
  <link href="{{ url('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- NProgress -->
  <link href="{{ url('admin/css/nprogress.css') }}" rel="stylesheet" type="text/css" />
  <!-- Animate.css -->
  <link href="{{ url('admin/css/animate.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Custom Theme Style -->
  <link href="{{ url('admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="login">
  


    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <h1>Register Form</h1>
            <div class="form-group">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label for="phone_no" class="form-label">Phone Number</label>
              <input type="number" class="form-control" name="phone_no">
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
              <label for="cpassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password">
            </div>
            <div class="form-group">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
              <label for="profile_pic" class="form-label">Image</label>
              <input type="file" class="form-control" name="profile_pic">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>

          </form>
        </section>
      </div>

    </div>
  </div>
</body>

</html>