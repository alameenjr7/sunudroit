@extends('backend.layouts.master')

@section('content')

<div class="main-content">
    <div class="breadcrumb">
        <h1><a href="{{route('admin')}}">Tableau de bord</a></h1>
        <ul>
            <li>Entreprises</li>
            <li>Creation d'une Entreprises de Confiances</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Remplissez les cases suivantes </div>
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
                    <form action="{{route('brand.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Title</label>
                                <input class="form-control form-control-rounded"  type="text" name="title" value="{{old('title')}}" required placeholder="Enter your title" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="exampleInputEmail2">URL</label>
                                <input class="form-control form-control-rounded" type="text" name="slug" value="{{old('slug')}}" placeholder="SLUG" />
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Status</label>
                                <select name="status" class="form-control form-control-rounded">
                                    <option value="active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Desactiver</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
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
@endsection