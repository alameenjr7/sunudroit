@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Entreprises</li>
            <li>Modification d'une Entreprises de Confiances</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Modifiez les cases suivantes </div>
                    <div class="col-md-12">
                        @include('components.errors')
                    </div>
                    <form action="{{route('categorie.update',$categorie->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded"  type="text" name="title" value="{{$categorie->title}}" required placeholder="Enter your title" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded">
                                    <option value="active" {{$categorie->status=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{$categorie->status=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>
                            
                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Photo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choisir
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$categorie->photo}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="exampleInputEmail2">Description</label>
                                <textarea id="contenu" class="form-control form-control-rounded" type="text" name="description" placeholder="Description">{{$categorie->description}}</textarea>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="checkbox checkbox-primary"> Is Parent
                                    <input id="is_parent" type="checkbox" name="is_parent" value="{{$categorie->is_parent}}" {{$categorie->is_parent==1 ? 'checked' : ''}} /><span>OUI</span><span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="col-md-6 form-group mb-3 {{$categorie->is_parent==1 ? 'd-none' : ''}}" id="parent_cat_div">
                                <label for="picker1">Categorie Parent</label>
                                <select name="cat_id" class="form-control form-control-rounded">
                                    <option value="">-- Selectionner --</option>
                                    @foreach ($parent_cats as $pcats)
                                        <option value="{{$pcats->id}}" {{$categorie->parent_id==$pcats->id ? 'selected' : ''}}>{{$pcats->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="create btn btn-primary">Mettre a jour</button>
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
        function yesnoCheck(that) {
            if(that.value == "active"){
                document.getElementById("open").style.display="block";

            } else{
                document.getElementById("open").style.display="none";
            }
        }
    </script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.update').click(function(e) {
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
    })
</script>
@endsection
