<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>VanMart Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset ('template')}}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset ('template')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset ('template')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset ('template')}}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset ('template')}}/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset ('template')}}/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! Login Dulu ya!!    </h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form action="{{route('cekLogin')}}" method="post" novalidate>
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control @error('email')
                    is-invalid
                  @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="icon envelope-icon"></span>
                    </div>
                  </div>
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="form-group">
                  <input type="password" class="form-control @error('password')
                  is invalid
                  @enderror" id="password" placeholder="Password" name="password" value="{{old('password')}}">
                </div>

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="icon lock-icon"></span>
                    </div>
                  </div>
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                @error('nofound')
                  <div class="row mb-2">
                    <div class="col-12 text-center text-danger">
                        {{ $message }}
                    </div>
                  </div>
                  @enderror

                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="/">SIGN IN</a>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa Password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum Punya Akun? <a href="register.html" class="text-primary">Buat</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset ('template')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset ('template')}}/js/off-canvas.js"></script>
  <script src="{{ asset ('template')}}/js/hoverable-collapse.js"></script>
  <script src="{{ asset ('template')}}/js/template.js"></script>
  <script src="{{ asset ('template')}}/js/settings.js"></script>
  <script src="{{ asset ('template')}}/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
