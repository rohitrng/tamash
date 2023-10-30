<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>GameHub Pro - Wallet Systme |Balaji Bhau </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets/')}}/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{url('assets/')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('assets/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{url('assets/')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>
   
    <body>
        <div class="auth-bg-basic align-items-center min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 py-5 px-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="text-center text-muted mb-1">
                                <div class="pb-2">
                                    <a href="#">
                                        <span class="logo-lg">
                                            <img src="{{url('assets/')}}/images/logo-png-web.png" alt="" height="24"> 
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
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to GameHub Pro. by balaji Bhau</p>
                                        </div>
                                        <form class="mt-4 pt-2" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                                        name="username" 
                                                        value="{{ old('username') }}" 
                                                        required 
                                                        autocomplete="username" 
                                                        autofocus
                                                id="input-username" placeholder="Enter your User Name">
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

                                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="password-input" placeholder="Enter your Password"
                                                    name="password" 
                                                    required 
                                                    autocomplete="current-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                                <label for="password-input">Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-padlock"></i>
                                                </div>
                                            </div>
        
                                            <div class="form-check form-check-primary font-size-16 py-1">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                
                                                <label class="form-check-label font-size-14" for="remember-check">
                                                    Remember me
                                                </label>
                                            </div>
        
                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100" type="submit">Log In</button>
                                            </div>
    
                                            
    
                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">Don't have an account ? <a href="{{ url('register') }}" class="fw-semibold text-decoration-underline"> Signup Now </a> </p>
                                            </div>
        
                                        </form><!-- end form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->

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
        <script src="{{url('assets/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('assets/')}}/libs/metismenujs/metismenujs.min.js"></script>
        <script src="{{url('assets/')}}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{url('assets/')}}/libs/feather-icons/feather.min.js"></script>

        <script src="{{url('assets/')}}/js/pages/pass-addon.init.js"></script>

    </body>
</html>
