<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Google Fonts -->
  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            <span class="d-none d-lg-block">PGS</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Register an Account</h5>
                            </div>
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    {{ Session::get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- <div class="col-12">
                                    <label for="yourRole" class="form-label">User Role</label>
                                    <div class="input-group has-validation">
                                        <select name="role" class="form-control" id="yourRole" required>
                                            <option selected disabled>Select Role</option>
                                            <option value="user">user</option>
                                            <option value="administrator">admin</option>
                                            <option value="student">student</option>
                                            <option value="faculty">faculty</option>
                                            <option value="supervisor">supervisor</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="name" class="form-control" id="name" required>
                                        <div class="invalid-feedback">Please enter your username.</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <div class="input-group has-validation">
                                        <input type="email" name="email" class="form-control" id="email" required>
                                        <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="firstnames" class="form-label">First Names</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="firstnames" class="form-control" id="firstnames" required>
                                        <div class="invalid-feedback">Please enter your name.</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Last name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="lastname" class="form-control" id="lastname" required>
                                        <div class="invalid-feedback">Please enter your last name.</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <div class="input-group has-validation">
                                        <input type="tel" name="phone_number" class="form-control" id="phone_number"  placeholder="0712 345 678" required>
                                        <!-- pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" -->
                                        <div class="invalid-feedback">Please enter your phone number.</div>
                                    
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="national_id" class="form-label">National ID</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="national_id" class="form-control" id="national_id"  placeholder="Format: 12-3456789-A-10" required>
                                        <!-- pattern="[0-9]{2}-[0-9]{7}-[a-zA-Z]-[0-9]{2} | [0-9]{2}-[0-9]{6}-[a-zA-Z]-[0-9]{2}" -->
                                        <div class="invalid-feedback">Please enter your National ID.</div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="address" class="form-control" id="address" required>
                                        <div class="invalid-feedback">Please enter your Address.</div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                                <div class="col-6">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Register</button>
                                </div>
                                <div class="col-12">
                                    <b><p class="small mb-0">Already have account? <a href="/login">Login</a></p></b>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="credits">
                        Designed by <b>PGS</b>
                    </div>

                </div>
            </div>
            </div>

        </section>

        </div>
    </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>
