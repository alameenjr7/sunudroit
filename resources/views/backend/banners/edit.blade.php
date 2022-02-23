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
                        @include('components.errors')
                    </div>
                    <form action="{{route('banniere.update',$banner->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded" type="text" name="title" value="{{$banner->title}}" required placeholder="Enter your title" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName2">Sous Titre</label>
                                <input class="form-control form-control-rounded" type="text" name="subtitle" value="{{$banner->subtitle}}" required placeholder="Enter your subtitle" />
                            </div>
                            {{-- <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail2">URL</label>
                                <input class="form-control form-control-rounded"  type="text" name="slug" value="{{$banner->slug}}" placeholder="SLUG" />
                            </div> --}}
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded" onchange="yesnoCheck(this)">
                                    <option value="active" {{$banner->status=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{$banner->status=='inactive' ? 'selected' : ''}}>Desactiver</option>
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
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
                                </div>
                                <div id="holder" style="margin-top: 15px;height: 100px;">
                                    @if ($banner->photo != null)
                                        <img src="{{asset($banner->photo)}}" alt="logo" style="border: 1px solid #ddd; padding: 4px 8px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Description</label>
                                <textarea class="form-control form-control-rounded" id="contenu"  placeholder="Ecrire quelque chose ..." name="description">{{$banner->description}}</textarea>
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
