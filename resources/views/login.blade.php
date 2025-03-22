<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: url({{ asset('assets/img/bg-login.jpg') }}) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            object-fit: cover;
        }

        .login-container h3 {
            text-align: center;
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
        }

        .btn-primary {
            background-color: #7289ef;
            border: none;
            font-size: 18px;
            padding: 10px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #667eea;
        }
    </style>
</head>

<body>
    <section class="p-3 p-md-4">
        <div class="container">
            <div class="card shadow-sm bg-dark text-light">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid rounded-start object-fit-cover h-100 w-100" loading="lazy"
                            src="{{ asset('assets/img/Raja_Ampat.jpg') }}" alt="BootstrapBrain Logo">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 text-center">
                                        <h3>Login</h3>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="/auth">
                                @csrf
                                <div class="row gy-3 mt-3">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                            placeholder="Masukkan email Anda" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}" required autocomplete="password"
                                            placeholder="Input Your password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="d-grid mt-3">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Log in</button>
                                        </div>
                                        {{-- <p class="mt-4">
                                            <a href="/forgot" class="link text-decoration-none">forgot password?</a>
                                        </p> --}}
                            
                                        <p class="mt-5">
                                            Don't have an account?
                                            <a href="/register" class="link text-decoration-none">Create new account</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 border-secondary-subtle">
                                    <div class="d-flex flex-column flex-md-row justify-content-md-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('register'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registration Success',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true,
                    width: '300px',
                    heightAuto: false,
                    padding: '0.5em'
                });
            @endif
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('pesan'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Login Failed',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true,
                    width: '300px',
                    heightAuto: false,
                    padding: '0.5em'
                });
            @endif
        });
    </script>
</body>

</html>
