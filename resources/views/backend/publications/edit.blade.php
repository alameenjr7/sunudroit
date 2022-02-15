@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Publication</li>
            <li>Modification</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Modification d'une publication</div>
                    <div class="col-md-12">
                        @include('components.errors')
                    </div>
                    <form action="{{route('publication.update', $publication->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName1">Titre</label>
                                <input class="form-control" id="title" name="title" value="{{$publication->title}}" type="text" placeholder="Entrer un titre" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName1">Sous Titre</label>
                                <input class="form-control" id="subtitle" type="text" name="subtitle" value="{{$publication->subtitle}}" placeholder="Entrer un sous titre" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail1">Photo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i>Choisir une image
                                        </a>
                                    </span>
                                    <input type="text" id="thumbnail" class="form-control" name="photo" value="{{$publication->photo}}">
                                </div>
                                <div id="holder" style="margin-top: 15px;height: 100px;">
                                    @if ($publication->photo != null)
                                        <img src="{{asset($publication->photo)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Select</label>
                                <select name="status" class="form-control">
                                    <option value="active" {{$publication->status=='active' ? 'selected' : ''}}>Publier</option>
                                    <option value="inactive" {{$publication->status=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Condition</label>
                                <select name="conditions" class="form-control">
                                    <option value="publier" {{$publication->conditions=='publier' ? 'selected' : ''}}>Publier</option>
                                    <option value="is_featured" {{$publication->conditions=='is_featured' ? 'selected' : ''}}>Future Pub</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="cat_id">Select</label>
                                <select id="cat_id" name="cat_id" class="form-control">
                                    <option value="">-- Categories --</option>
                                    @foreach (\App\Models\Categorie::where('is_parent',1)->get() as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id==$publication->cat_id ? 'selected' : ''}}>{{ucfirst($cat->title)}}</option>
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
                                <textarea class="form-control" id="contenu" name="contenu" placeholder="Description ...">{{$publication->contenu}}</textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Mettre a jour</button>
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
    var child_cat_id = {{$publication->child_cat_id}};
    $('#cat_id').change(function(){
        var cat_id = $(this).val();
        if(cat_id != null){
                $.ajax({
                    url: "/admin/categorie/"+cat_id+"/child",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        cat_id:cat_id,
                    },
                    success:function(response){
                        console.log(response);
                        var html_option = "<option value=''>-- Sous Categorie --</option>";
                        if(response.status){
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data,function(id,title){
                                html_option += "<option value='"+id+"' "+(child_cat_id == id ? 'selected' : '')+">"+title+"</option>"
                            });
                        }
                        else{
                            $('#child_cat_div').removeClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            }
    });
    if(child_cat_id != null){
        $('#cat_id').change();
    }
</script>
@endsection