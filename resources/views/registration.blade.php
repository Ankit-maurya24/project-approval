<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/customStyle.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">

        <div class="col-md-4">

            <div class="card shadow-lg register-card">

                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Create Account</h3>


                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">

                        @csrf


                        <!-- Name -->
                        <div class="mb-3">

                            <label class="form-label">Full Name</label>

                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- Email -->
                        <div class="mb-3">

                            <label class="form-label">Email Address</label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Enter your email"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- Password -->
                        <div class="mb-3">

                            <label class="form-label">Password</label>

                            <input type="password" name="password" placeholder="Enter password"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <button type="submit" class="btn btn-primary w-100">
                            Register
                        </button>

                    </form>


                    <hr>

                    <p class="text-center mb-0">
                        Already have an account?
                        <a href="{{ route('login.form') }}" class="fw-bold text-decoration-none">
                            Sign In
                        </a>
                    </p>


                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
