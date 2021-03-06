<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion | Admin Sunudroit</title>
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
                        <h1 class="mb-3 text-18">Connexion</h1>
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input class="form-control form-control-rounded @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email" type="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input class="form-control form-control-rounded @error('password') is-invalid @enderror" name="password" required id="password" type="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Connecter</button>
                        </form>
                        <div class="mt-3 text-center"><a class="text-muted" href="{{route('password.request')}}">
                                <u>Mot de passe oublie?</u></a></div>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url({{asset('frontend/assets/images/resource/hammer.png')}})">
                    {{-- <div class="pr-3 auth-right"><a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-rounded btn-outline-google btn-block btn-icon-text"><i class="i-Google-Plus"></i> Sign up with Google</a><a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook"><i class="i-Facebook-2"></i> Sign up with Facebook</a></div> --}}
                </div>
            </div>
        </div>
    </div>
</div>