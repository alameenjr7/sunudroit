@extends('frontend.layouts.master')

@section('content')

<section class="contact-form-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>CALCULER MES DROITS</h2>
        </div>
        <div class="row">
                <div class="col-md-12 m-auto">
                    @if (session('message'))
                        <div class="alert alert-success text-center">
                            {{session('message')}}
                            <p style="font-size: 14px; font-family:'Times New Roman', Times, serif; font-wight: bold">Veuiller contacter nos services pour plus d'info SVP!</p>
                        </div>
                    @endif
                </div>
            </div>
        <!-- Contact Form -->
        <div class="contact-form">
            
            @include('components.errors')
            <!--Contact Form-->
            <form action="{{route('calcul.submit')}}" method="POST">
                @csrf
                <div class="row clearfix">

                    <div class=" col-md-6 col-sm-12 form-group">
                        <label for="full_name">Votre nom complet</label>
                        <input class="form-control" type="text" id="full_name" name="full_name" placeholder="Baba NGOM" required>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group">
                        <label for="email">Votre adresse e-mail</label>
                        <input class="form-control" type="email" name="email" id="email"  placeholder="sunudroit@gmail.cm" required>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group">
                        <label for="types">Type de salaire</label>
                        <select name="types" class="custom-select-box form-control">
                            {{-- <option value="">-- Choisir --</option> --}}
                            <option value="DF" >Droit de la Famille</option>
                            <option value="DT" >Droit du Travail</option>
                            <option value="BC" >Bail Commercial</option>
                        </select>
                    </div>

                    <div class=" col-md-6 col-sm-12 form-group">
                        <label for="salaire">Votre salaire actuel</label>
                        <input  type="number" id="salaire" name="salaire"  placeholder="Ex: 75 000" required 
                            style="position: relative;
                            display: block;
                            width: 100%;
                            line-height: 28px;
                            padding: 10px 22px;
                            color: #222222;
                            height: 55px;
                            font-size: 16px;
                            background: #ffffff;
                            font-weight: 400;
                            border-radius: 2px;"
                        >
                    </div>


                    <div class=" col-md-12 col-sm-12 form-group text-center">
                        <button class="theme-btn btn-style-two" type="submit">
                            <span class="txt">Calculer 
                                <i class="arrow flaticon-right"></i>
                            </span>
                        </button>
                    </div>

                </div>
            </form>

            <!--End Contact Form -->
        </div>
    </div>
</section>

@endsection


@section('scripts')



@endsection