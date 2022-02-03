@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Banniere</li>
            <li>Creation d'une Banniere</li>
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
                    <form action="{{route('banner.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded" id="firstName2" type="text" name="title" value="{{old('title')}}" required placeholder="Enter your title" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName2">Sous Titre</label>
                                <input class="form-control form-control-rounded" id="lastName2" type="text" name="subtitle" value="{{old('subtitle')}}" required placeholder="Enter your subtitle" />
                            </div>
                            {{-- <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail2">URL</label>
                                <input class="form-control form-control-rounded" id="exampleInputEmail2" type="text" name="slug" value="{{old('slug')}}" placeholder="SLUG" />
                            </div> --}}
                            <div class="col-md-12 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded">
                                    <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Desactiver</option>
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
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                            
                            <div class="col-md-12 form-group mb-3">
                                <label for="website2">Description</label>
                                <textarea class="form-control form-control-rounded" id="contenu" placeholder="Web address" name="description" placeholder="Description ...">{{old('description')}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="create btn btn-primary">Submit</button>
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
@endsection