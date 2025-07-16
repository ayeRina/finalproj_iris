<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>IRIS | Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="IRIS | Register Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="Register to IRIS system." />
    <meta name="keywords" content="bootstrap, register, login, admin dashboard, laravel" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
    
    <!-- Plugins -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('css/adminlte.css') }}" />

    <style>
        body.register-page {
            background-color: #ffd9ec !important; /* light pink background */
            color: #000 !important;
        }
        .register-box .card {
            border: 2px solid #f08db9;
            box-shadow: 0 4px 20px rgba(240, 141, 185, 0.3);
        }
        .register-logo img {
            width: 80px;
            animation: float 2s ease-in-out infinite;
        }
        .btn-primary {
            background-color: #f08db9;
            border-color: #f08db9;
            color: #000;
        }
        .btn-primary:hover {
            background-color: #e678a7;
            border-color: #e678a7;
            color: #000;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<!--end::Head-->

<!--begin::Body-->
<body class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <img src="{{ url('assets/img/happy.png') }}" alt="Cat logo">
            <h2><strong>IRIS</strong></h2>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name') }}" />
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                        @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault"> I agree to the <a href="#">terms</a> </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mb-0 mt-3">
                    <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('js/adminlte.js') }}"></script>
</body>
<!--end::Body-->
</html>
