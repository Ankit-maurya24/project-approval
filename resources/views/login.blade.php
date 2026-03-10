<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/customStyle.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />



</head>

<body>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">

        <div class="col-md-4">

            <div class="card shadow-lg login-card">

                <div class="card-body p-4">

                    <h3 class="text-center mb-4">User Login</h3>


                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <form action="{{ route('login.submit') }}" method="POST">

                        @csrf


                        <div class="mb-3">

                            <label class="form-label">Email</label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>



                        <div class="mb-3">

                            <label class="form-label">Password</label>

                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>


                    <hr>

                    <p class="text-center mb-0">
                        Don't have an account?
                        <a href="{{ route('registration.form') }}" class="fw-bold text-decoration-none">
                            Sign Up
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
