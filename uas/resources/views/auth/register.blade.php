<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  {!! RecaptchaV3::initJs() !!}
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Buat akun anda</p>

        <form action="{{ url('/register98') }}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <div class="input-group mb-3">
            <input name="name" type="name" class="form-control" placeholder="Nama lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="custom-file">
              <input required name="foto" type="file" class="custom-file-input" id="input_foto_profil">
              <label class="custom-file-label" for="input_foto_profil">Foto Profil</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="checkbox" id="is_seller" name="is_seller" value={{ true }}>
            <label for="is_seller" class="ml-2">Daftar sebagai seller</label>
          </div>
          <div class="mb-3 d-flex justify-content-center">
            <img src="" class="rounded-circle w-50" id="preview_image">
          </div>
          <div class="row">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <div class="col-md-6">
                  {!! RecaptchaV3::field('register') !!}
                </div>
              </div>
            @endif
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- ATAU -</p>
          <a href="/auth/google" class="btn btn-block btn-danger">
            <i class="fab fa-google mr-2"></i> Daftar dengan Google
          </a>
          <a href="/auth/github" class="btn btn-block btn-dark">
            <i class="fab fa-github mr-2"></i> Masuk dengan Github
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1 text-center">
          <a href="{{ url('/') }}">Sudah punya akun? Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    function readURL(input) {
      console.log(input.files[0]);
      if (input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#preview_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#input_foto_profil").change(function() {
      readURL(this);
    });
  </script>
</body>

</html>
