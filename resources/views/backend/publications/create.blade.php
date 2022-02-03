@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Publication</li>
            <li>Creation</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Ajout d'une publication</div>
                    <div class="col-md-12">
                        @include('components.errors')
                    </div>
                    <form action="{{route('publication.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Titre</label>
                                <input class="form-control" id="title" name="title" value="{{old('title')}}" type="text" placeholder="Entrer un titre" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Sous Titre</label>
                                <input class="form-control" id="subtitle" type="text" name="subtitle" value="{{old('subtitle')}}" placeholder="Entrer un sous titre" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail1">Photo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir une image
                                        </a>
                                    </span>
                                    <input type="text" id="thumbnail" class="form-control" name="photo" value="{{old('photo')}}">
                                </div>
                                <div id="holder" style="margin-top:15px; max-height: 100px;"></div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Activer</option>
                                    <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Condition</label>
                                <select name="conditions" class="form-control">
                                    <option value="publier" {{old('conditions')=='publier' ? 'selected' : ''}}>Publier</option>
                                    <option value="is_featured" {{old('conditions')=='is_featured' ? 'selected' : ''}}>Future Pub</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="cat_id">Select</label>
                                <select id="cat_id" name="cat_id" class="form-control">
                                    <option value="">-- Categories --</option>
                                    @foreach (\App\Models\Categorie::where('is_parent',1)->get() as $cat)
                                        <option value="{{$cat->id}}">{{ucfirst($cat->title)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3 d-none" id="child_cat_div">
                                <label for="">Sous Categorie</label>
                                <select id="child_cat_id" name="child_cat_id" class="form-control">
                                    
                                </select>
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="credit1">Contenu</label>
                                <textarea class="form-control" id="contenu" name="contenu" placeholder="Description ...">{{old('contenu')}}</textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Enregistrer</button>
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
        $('#cat_id').change(function(){
            var cat_id = $(this).val();
            if(cat_id != null){
                $.ajax({
                    url:"/admin/categorie/"+cat_id+"/child",
                    type:"POST",
                    data: {
                        _token:"{{csrf_token()}}",
                        cat_id:cat_id,
                    },
                    success:function(response){
                        // console.log(response);
                        var html_option = "<option value=''>-- Sous Categorie --</option>";
                        if(response.status){
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data,function(id,title){
                                html_option +="<option value='"+id+"'>"+title+"</option>"
                            });
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            }
        });
    </script>

@endsection