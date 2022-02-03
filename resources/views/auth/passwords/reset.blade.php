<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gull - Laravel + Bootstrap 4 admin template</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{asset('backend/assets/dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet">
</head>
<div class="auth-layout-wrap" style="background-image: url({{asset('backend/assets/dist-assets/images/photo-wide-4.jpg')}})">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url({{asset('frontend/assets/images/background/1.jpg')}})">
                    <div class="pl-3 auth-right">
                        <div class="auth-logo text-center mt-4"><img src="{{asset('frontend/assets/images/sunudroit-logo/logo.png')}}" alt=""></div>
                        {{-- <div class="flex-grow-1"></div>
                        <div class="w-100 mb-4"><a class="btn btn-outline-primary btn-block btn-icon-text btn-rounded" href="signin.html"><i class="i-Mail-with-At-Sign"></i> Sign in with Email</a><a class="btn btn-outline-google btn-block btn-icon-text btn-rounded"><i class="i-Google-Plus"></i> Sign in with Google</a><a class="btn btn-outline-facebook btn-block btn-icon-text btn-rounded"><i class="i-Facebook-2"></i> Sign in with Facebook</a></div>
                        <div class="flex-grow-1"></div> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4">
                        <h1 class="mb-3 text-18">Réinitialiser le mot de passe</h1>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input class="form-control form-control-rounded @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input class="form-control form-control-rounded @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Conirmer votre mot de passe</label>
                                <input class="form-control form-control-rounded" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Réinitialiser le mot de passe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>