{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url({{ asset('assets/img/Raja_Ampat.jp  g') }}) no-repeat center center fixed;
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
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid rounded-start object-fit-cover h-100 w-100" loading="lazy"
                            src="{{ asset('assets/img/w2e.jpg') }}" alt="BootstrapBrain Logo">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 text-center">
                                        <h3>Register</h3>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
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
</body>

</html>
 --}}


 <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                                        <h3>Register</h3>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="/authregister">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  id="name"placeholder="Input Your name" >

                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"   id="email" placeholder="Input Your email" >

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Input Your password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Register</button>
                                        </div>
                                        <p class="mt-3">
                                            {{-- Don't have an account? --}}
                                            <a href="/" class="link text-decoration-none">Back To Login</a>
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
</body>

</html>
