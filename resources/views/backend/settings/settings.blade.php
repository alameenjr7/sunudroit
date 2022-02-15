@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Paramettre</li>
            <li>Liste des Paramettre</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Paramettres</div>
                    <form action="{{route('settings.update',$setting->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="firstName1">Slogan du site</label>
                                <input class="form-control" id="firstName1" type="text" name="title" value="{{$setting->title}}" placeholder="Enter your first name" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Meta Description</label>
                                <textarea class="form-control" rows="5" id="lastName1" type="text" name="meta_description"placeholder="Enter your last name">{{$setting->meta_description}}</textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Meta Keywords</label>
                                <textarea class="form-control" rows="5" id="lastName1" type="text" name="meta_keywords" placeholder="Enter your last name">{{$setting->meta_keywords}}</textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Logo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a style="color:#ddd" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="logo" value="{{$setting->logo}}" placeholder="Choisir une image" />
                                </div>
                                <div id="holder" style="margin-top: 15px;max-height: 100px;">
                                    @if (get_setting('logo'))
                                        <img src="{{asset($setting->logo)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Logo 2</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a style="color:#ddd" id="lfm1" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="logo2" value="{{$setting->logo2}}" placeholder="Choisir une image" />
                                </div>
                                <div id="holder" style="margin-top: 15px;max-height: 100px;">
                                    @if (get_setting('logo2'))
                                        <img src="{{asset($setting->logo2)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Favicon</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a style="color:#ddd" id="lfm2" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="favicon" value="{{$setting->favicon}}" placeholder="Choisir une image" />
                                </div>
                                <div id="holder" style="margin-top: 15px;max-height: 100px;">
                                    @if (get_setting('favicon'))
                                        <img src="{{asset($setting->favicon)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Favicon 2</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a style="color:#ddd" id="lfm3" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="favicon2" value="{{$setting->favicon2}}" placeholder="Choisir une image" />
                                </div>
                                <div id="holder" style="margin-top: 15px;max-height: 100px;">
                                    @if (get_setting('favicon2'))
                                        <img src="{{asset($setting->favicon2)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail1">Adresse email 1</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email_1" value="{{$setting->email_1}}" placeholder="Enter email" />
                                <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail1">Adresse email 2</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email_2" value="{{$setting->email_2}}" placeholder="Enter email" />
                                <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="phone">Telephone portable</label>
                                <input class="form-control" id="phone" name="telephone1" value="{{$setting->telephone1}}" placeholder="Entrer votre telephone" />
                            </div>
                            
                            <div class="col-md-6 form-group mb-3">
                                <label for="phone">Telephone fixe</label>
                                <input class="form-control" id="phone" name="telephone2" value="{{$setting->telephone2}}" placeholder="Entrer votre Fixe" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="credit1">Adresse</label>
                                <input class="form-control" id="credit1" name="adresse" value="{{$setting->adresse}}" placeholder="Votre adresse" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="credit1">Lot</label>
                                <input class="form-control" id="credit1" name="lot" value="{{$setting->lot}}" placeholder="Votre lot" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="credit1">Immeuble</label>
                                <input class="form-control" id="credit1" name="appartement" value="{{$setting->appartement}}" placeholder="Votre Immeuble" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="website">Fax</label>
                                <input class="form-control" id="website" placeholder="Entrer votre fax" name="fax" value="{{$setting->fax}}"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Lien Facebook</label>
                                <input class="form-control" id="picker2" placeholder="Votre lien ...." name="facebook_url" value="{{$setting->facebook_url}}"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Lien Twitter</label>
                                <input class="form-control" id="picker2" placeholder="Votre lien ...." name="twitter_url" value="{{$setting->twitter_url}}"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Lien Linkedin</label>
                                <input class="form-control" id="picker2" placeholder="Votre lien ...." name="linkedin_url" value="{{$setting->linkedin_url}}"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Lien Instagram</label>
                                <input class="form-control" id="picker2" placeholder="Votre lien ...." name="instagram_url" value="{{$setting->instagram_url}}"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Lien Youtube</label>
                                <input class="form-control" id="picker2" placeholder="Votre lien ...." name="youtube_url" value="{{$setting->youtube_url}}"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Lien Maps</label>
                                <input class="form-control" id="picker2" placeholder="Votre lien ...." name="map_url" value="{{$setting->map_url}}"/>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Text Footer</label>
                                <textarea rows="3" class="form-control" id="picker2" placeholder="Ecrire ..." name="footer">{{$setting->footer}}</textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Text Abonnement</label>
                                <textarea rows="3" class="form-control" id="picker2" placeholder="Ecrire ..." name="text_abonnement">{{$setting->text_abonnement}}</textarea>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Image Footer</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a style="color:#ddd" id="lfm4" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="image_footer" value="{{$setting->image_footer}}" placeholder="Choisir une image" />
                                </div>
                                <div id="holder" style="margin-top: 15px;max-height: 100px;">
                                    @if (get_setting('image_footer'))
                                        <img src="{{asset($setting->image_footer)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Background Footer</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a style="color:#ddd" id="lfm5" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="background_footer" value="{{$setting->background_footer}}" placeholder="Choisir une image" />
                                </div>
                                <div id="holder" style="margin-top: 15px;height: 100px;">
                                    @if (get_setting('background_footer'))
                                        <img src="{{asset($setting->background_footer)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Background Header</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm5" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color:#ddd">
                                            <i class="fa fa-picture-o"></i>Choisir
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="background_header" value="{{$setting->background_header}}" placeholder="Choisir une image" />
                                </div>
                                <div id="holder" style="margin-top: 15px;height: 100px;">
                                    @if (get_setting('background_header'))
                                        <img src="{{asset($setting->background_header)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Mettre a jour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        $('#lfm1').filemanager('image');
    </script>
    <script>
        $('#lfm2').filemanager('image');
    </script>
    <script>
        $('#lfm3').filemanager('image');
    </script>
    <script>
        $('#lfm4').filemanager('image');
    </script>
    <script>
        $('#lfm5').filemanager('image');
    </script>

@endsection