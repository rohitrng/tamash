<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Signup |GameHub Pro - Wallet Systme |Balaji Bhau</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <div class="auth-bg-basic align-items-center min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 py-5 px-3">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="text-center text-muted mb-2">
                            <div class="pb-3">
                                <a href="index.html">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-png-web.png" alt="" height="24"> 
                                    </span>
                                </a>
                                <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">GameHub Pro - Balaji Bhau</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-transparent shadow-none border-0">

                            <div class="card-body">
                                <div class="py-3">
                                    <div class="text-center">
                                        <h5 class="mb-0">Register Account</h5>
                                        <p class="text-muted mt-2">Get your free Balaji Bhau account now.</p>
                                    </div>
                                        <form class="mt-4 pt-2" method="POST" action="{{ url('register_c') }}">
                                            @csrf
                                        <div class="form-floating form-floating-custom mb-3">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus id="input-username" placeholder="Enter User Name">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-username">Username</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-users-alt"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-3">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-padlock"></i>
                                            </div>
                                        </div>
    
                                        <div class="form-floating form-floating-custom mb-3">
                                            <input type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">
                                            @error('number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-phone">Whatsapp Number</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-whatsapp-alt"></i>
                                            </div>
                                        </div>

                                        <div class="py-1">
                                            <p class="mb-0">By registering you agree to Balaji Bhau <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
    
                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100" type="submit">Register</button>
                                        </div>


                                        <div class="mt-4 pt-3 text-center">
                                            <p class="text-muted mb-0">Already have an account ? <a href="{{ url('login') }}" class="fw-semibold text-decoration-underline"> Login </a> </p>
                                        </div>
    
                                    </form><!-- end form -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="mt-4 mt-md-5 text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> GameHub Pro <i class="mdi mdi-cube text-info"></i> by Balaji Bhau</p>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
        <!-- end container fluid -->
    </div>
    <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

    </body>
</html>
