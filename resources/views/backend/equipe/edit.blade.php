@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Banniere</li>
            <li>Modification d'une Banniere</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Modifiez les cases suivantes </div>
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-card alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <strong class="text-capitalize">Danger!</strong> <br> <li>{{$error}}</li>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <form action="{{route('equipe.update',$equipePro->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Nom</label>
                                <input class="form-control form-control-rounded" type="text" name="nom" value="{{$equipePro->nom}}" required placeholder="Enter your title" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName2">Prenom</label>
                                <input class="form-control form-control-rounded" type="text" name="prenom" value="{{$equipePro->prenom}}" required placeholder="Enter your subtitle" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail2">Email</label>
                                <input class="form-control form-control-rounded"  type="email" name="email" value="{{$equipePro->email}}" placeholder="SLUG" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail2">Adresse</label>
                                <input class="form-control form-control-rounded"  type="text" name="adresse" value="{{$equipePro->adresse}}" placeholder="SLUG" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail2">Telephone</label>
                                <input class="form-control form-control-rounded"  type="number" name="telephone" value="{{$equipePro->telephone}}" placeholder="SLUG" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail2">Poste</label>
                                <input class="form-control form-control-rounded"  type="text" name="poste" value="{{$equipePro->poste}}" placeholder="SLUG" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded" onchange="yesnoCheck(this)">
                                    <option value="active" {{$equipePro->status=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{$equipePro->status=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="website2">Description</label>
                                <input class="form-control form-control-rounded"  name="description" value="{{$equipePro->description}}" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="website2">Photo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choisir
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$equipePro->photo}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="update btn btn-raised ripple btn-raised-success ml-1">Modifier</button>
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
@endsection
