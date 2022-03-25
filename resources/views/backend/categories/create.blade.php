@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Categories</li>
            <li>Creation de categories</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Remplissez les cases suivantes </div>
                    <div class="col-md-12">
                        @include('components.errors')
                    </div>
                    <form action="{{route('categorie.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded"  type="text" name="title" value="{{old('title')}}" required placeholder="Enter your title" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control form-control-rounded">
                                    <option id="status" value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                    <option id="status" value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Photo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a style="color: #ddd" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choisir
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                            
                            <div class="col-md-12 form-group mb-3">
                                <label for="exampleInputEmail2">Description</label>
                                <textarea id="contenu" class="form-control form-control-rounded" type="text" name="description" placeholder="Description...">{{old('description')}}</textarea>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="checkbox checkbox-primary"> Categorie Parent
                                    <input  type="checkbox" id="is_parent" name="is_parent" value="1" checked /><span>(default OUI)</span><span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="col-md-6 form-group mb-3 d-none" id="parent_cat_div">
                                <label for="parent_id">Categorie Parent</label>
                                <select name="parent_id" class="form-control form-control-rounded">
                                    <option value="">-- Selectionner --</option>
                                    @foreach ($parent_cats as $pcats)
                                        <option value="{{$pcats->id}}" {{old('parent_id')==$pcats->id ? 'selected' : ''}}>{{$pcats->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="create btn btn-primary">Enregistrer</button>
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
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.create').click(function(e) {
         e.preventDefault();
         var form = $(this).closest('form');
        //  var dataID = $(this).data('id');
        //   alert(dataID);
        swal({
            type: 'success',
            title: 'Success!',
            text: 'Your work has been saved',
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-success'
            })
            .then((willCreate)=> {
                if(willCreate){
                    form.submit();
                // swal('Your imaginary file has been created.');
            }
         });
    });
 </script>

 <script>
     $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked = $('#is_parent').prop('checked');
        if(is_checked){
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val('');
        }
        else{
            $('#parent_cat_div').removeClass('d-none');
        }
     });
 </script>
@endsection