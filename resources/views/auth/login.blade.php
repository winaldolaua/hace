<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>HCCI</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body class="">
    @if ($errors->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $errors->first('loginError') }}
    </div>
    @endif

    <div class="">
        <!-- Outer Row -->
        <div class="">
            <div class="">
                <div class="o-hidden border-0">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('images/login.png') }}" alt="" height="600" />
                            </div>
                            <div class="col-lg-6 d-flex flex-column">
                                <div class="p-5 mt-auto mb-auto">
                                    <div class="text-center">
                                        <h1 class="text-gray-900 mb-4 font-weight-bold">
                                            Log In
                                        </h1>
                                        <h4 class="text-gray-600 mb-4">
                                            Halo!! Selamat Datang Sahabat
                                            Halal
                                        </h4>
                                    </div>
                                    <form class="user" action="/login" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" aria-describedby="emailHelp" placeholder="Enter Email"
                                                autofocus value="{{old('email')}}" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" placeholder="Enter Password" required />
                                        </div>
                                        @error('email')
                                        <p class="text-danger text-center">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                        @if ($errors->has('loginError'))
                                        <div class="text-danger text-center">
                                            Email Or Password Wrong
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" />
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>

                                        <hr />
                                    </form>
                                    <hr />
                                    <!--<div class="text-center">
                                            <a
                                                href="forgot-password.html"
                                                class="text-success"
                                                >Forgot Password?</a
                                            >
                                        </div>
                                        <div class="text-center">
                                            <p>
                                                Belum punya akun?
                                                <a
                                                    href="/register"
                                                    class="text-success"
                                                    >Create an Account!</a
                                                >
                                            </p>
                                        </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{
                asset('vendor/bootstrap/js/bootstrap.bundle.min.js')
            }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{
                asset('vendor/jquery-easing/jquery.easing.min.js')
            }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>