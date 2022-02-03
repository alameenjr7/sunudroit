<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mot de passe oublie | Admin Sunudroit</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="{{asset('backend/assets/dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet">
</head>
<div class="auth-layout-wrap" style="background-image: url({{asset('frontend/assets/images/background/1.jpg')}})">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4"><img src="{{asset('frontend/assets/images/sunudroit-logo/logo.png')}}" alt=""></div>
                        
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1 class="mb-3 text-18">Mot de passe oublie?</h1>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input class="form-control form-control-rounded  @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block btn-rounded mt-3" type="submit">Réinitialiser</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a class="text-muted" href="{{route('admin.login')}}">
                                <u>Connexion</u>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url({{asset('frontend/assets/images/resource/hammer.png')}})">
                    {{-- <div class="pr-3 auth-right"><a class="btn btn-outline-primary btn-outline-email btn-block btn-icon-text btn-rounded" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-outline-primary btn-outline-google btn-block btn-icon-text btn-rounded"><i class="i-Google-Plus"></i> Sign in with Google</a><a class="btn btn-outline-primary btn-outline-facebook btn-block btn-icon-text btn-rounded"><i class="i-Facebook-2"></i> Sign in with Facebook</a></div> --}}
                </div>
            </div>
        </div>
    </div>
</div>